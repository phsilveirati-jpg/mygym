<?php

namespace Tests\Feature;

use App\Models\ClassType;
use App\Models\ScheduledClass;
use App\Models\User;
use Database\Seeders\ClassTypeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InstructorTest extends TestCase
{
    use refreshDatabase;

    public function test_instructor_is_redirected_to_instructor_dashboard(): void
    {
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);

        $response = $this->ActingAs($user)->get('dashboard');

        $response->assertRedirectToRoute('instructor.dashboard');

        $this->followRedirects($response)->assertSeeText('Welcome Instructor');
    }

    public function test_instructor_can_schedule_a_class()
    {
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);

        $this->seed(ClassTypeSeeder::class);

        $response = $this->ActingAs($user)->post('instructor/schedule', [
            'class_type_id' => ClassType::first()->id,
            'date' => '2025-01-03',
            'time' => '17:00:00',
        ]);

        $this->assertDatabaseHas('scheduled_classes', [
            'class_type_id' => ClassType::first()->id,
            'date_time' => '2025-01-03 17:00:00',
        ]);

        $response->assertRedirectToRoute('schedule.index');

    }

    public function test_instructor_can_cancel_class()
    {
        //Given
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);

        $this->seed(ClassTypeSeeder::class);

        $scheduledClass = ScheduledClass::create([
            'instructor_id' => $user->id,
            'class_type_id' => ClassType::first()->id,
            'date_time' => '2025-01-04 12:00:00',
        ]);

        //when
        $response = $this->actingAs($user)->delete('/instructor/schedule/' . $scheduledClass->id);

        //Then
        $this->assertDatabaseMissing('scheduled_classes', [
            'id' => $scheduledClass->id,
        ]);

    }

    public function test_cannot_cancel_class_less_than_two_hours_before()
    {
        //Given
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);

        $this->seed(ClassTypeSeeder::class);

        //when
        $scheduledClass = ScheduledClass::create([
            'instructor_id' => $user->id,
            'class_type_id' => ClassType::first()->id,
            'date_time' => now()->addHours(1)->minute(0)->second(0)
        ]);

        $response = $this->actingAs($user)->get('instructor/schedule');

        $response->assertDontSeeText('Cancel');

        $response = $this->actingAs($user)->delete('/instructor/schedule/' . $scheduledClass->id);

        //Then
        $this->assertDatabaseHas('scheduled_classes', ['id' => $scheduledClass->id]);
    }
}

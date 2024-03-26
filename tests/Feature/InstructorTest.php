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
    use RefreshDatabase;
    public function test_instructor_is_redirected_to_instructor_dashboard()
    {
        $user = User::factory()->create([
            'role' => 'instructor'
        ]);
        $response = $this->actingAs($user)
            ->get('/dashboard');

        $response->assertRedirect(route('instructor.dashboard'));

        $response = $this->followRedirects($response);

        $response->assertSee("instructor chirrrrrr");

        //php artisan test --filter test_instructor_is_redirected_to_instructor_dashboard
    }

   public function test_instructor_can_schedule_a_class()
   {

       $user=User::factory()->create([
           'role'=>'instructor'
       ]);
       $this->seed(ClassTypeSeeder::class);

       $response=$this->actingAs($user)->post('instructor/schedule',[
           'class_type_id'=>ClassType::first()->id,
           'date'=>'2030-04-20',
           'time'=>'09:00:00'
       ]);

       $this->assertDatabaseHas('scheduled_classes',[
          'class_type_id'=>ClassType::first()->id,
           'date_time'=>'2030-04-14 09:00:00'
       ]);
       $response->assertRedirectToRoute('schedule.index');

       //php artisan test --filter test_instructor_can_schedule_a_class
   }

   //data base testing
 public function test_instructor_can_cancel_class()
 {
     //Given
     $user=User::factory()->create([
         'role'=>'instructor'
     ]);
     $this->seed(ClassTypeSeeder::class);
     $scheduledClass=ScheduledClass::create([
         'instructor_id'=>$user->id,
         'class_type_id'=>ClassType::first()->id,
         'date_time'=>'2024-03-25 18:00:00'
     ]);
     //when
     $response=$this->actingAs($user)
         ->delete('/instructor/schedule/'.$scheduledClass->id);
     //then
     $this->assertDatabaseMissing('scheduled_classes',[
         'id'=> $scheduledClass->id
     ]);
     //php artisan test --filter test_instructor_can_cancel_class
 }




}

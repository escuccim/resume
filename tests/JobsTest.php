<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Escuccim\Resume\Models\Job;

class JobsTest extends BrowserKitTest
{
	use DatabaseTransactions;

   public function testJobsAppear()
   {
       // create an admin user to test with
       $user = factory(App\User::class)->create();
       $user->type = 1;

       // test page in each language
       $langs = config('cv.langs');
       foreach ($langs as $lang){
               // set language to English
               app()->setLocale($lang);

           // check that pages appear
           $this->actingAs($user)
               ->visit('/cvadmin')
               ->assertResponseOk()
               ->see(html_entity_decode(trans('cv-lang::cv.professionalexperience')));

           $this->actingAs($user)
               ->visit('/cvadmin/create')
               ->see(html_entity_decode(trans('cv-lang::cv.company')))
               ->see(html_entity_decode(trans('cv-lang::cv.update')));
       }
   }

   public function testAddJob(){
       // create an admin user to test with
       $user = factory(App\User::class)->create();
       $user->type = 1;

       // add a job
       $this->actingAs($user)
           ->visit('/cvadmin/create')
           ->type('Yoyodyne', 'company')
           ->type('Awesome Dude', 'position')
           ->type('0', 'order')
           ->type('Being awesome always', 'description')
           ->press(trans('cv-lang::cv.update'))
           ->assertResponseOk()
           ->see('The job entry has been successfully created');

       // make sure it is in the DB
       $this->seeInDatabase('jobs', [
           'company' => 'Yoyodyne',
       ]);

       // make sure it appears on the admin page
       $this->actingAs($user)
           ->visit('/cvadmin')
           ->see('Yoyodyne');

       // make sure it appears in the actual CV
        $this->visit('cvadmin/preview')
            ->see('Awesome Dude');
   }

   public function testEditJob(){
       // create an admin user to test with
       $user = factory(App\User::class)->create();
       $user->type = 1;

       // test page in each language
       $langs = config('cv.langs');
       foreach($langs as $lang) {
           app()->setLocale($lang);

           // add a job
           $job = Job::create([
               'order' => 100,
               'company' => 'Mothers of Invention',
               'position' => 'The Coder of the Group',
               'startdate' => date('Y-m-d'),
               'enddate' => date('Y-m-d'),
               'description' => 'Doing stuff and different stuff',
               'lang' => $lang,
           ]);

           // make sure it is updated in the DB
           $this->seeInDatabase('jobs', [
               'company' => $job->company,
                'lang'  => $lang,
           ]);

           // visit the page
           $this->actingAs($user)
               ->visit('/cvadmin/' . $job->id)
               ->assertResponseOk()
               ->see($job->company)
               ->see(html_entity_decode(trans('cv-lang::cv.editentry')))
               ->click(html_entity_decode(trans('cv-lang::cv.editentry')))
               ->assertResponseOK();

           // make sure job appears on CV
           $this->visit('/cvadmin/preview')
               ->see($job->company);

           // modify the job
           $this->actingAs($user)
               ->visit('/cvadmin/' . $job->id . '/edit')
               ->see($job->position)
               ->type('The Tester of the Group', 'position')
               ->type('Testing shit all day long', 'description')
               ->press(html_entity_decode(trans('cv-lang::cv.update')))
               ->assertResponseOk()
               ->see($job->company);

           // make sure it is updated in the DB
           $this->seeInDatabase('jobs', [
               'company' => 'Mothers Of Invention',
               'position' => 'The Tester of the Group',
           ]);

           // make sure it is updated on the page
           $this->visit('cvadmin/preview')
               ->see('Testing shit all day long');

           Job::destroy($job->id);
       }
   }


}

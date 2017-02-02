<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Escuccim\Resume\Models\Education;

class EducationTest extends BrowserKitTest
{
	use DatabaseTransactions;

   public function testEducationsAppear()
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
               ->visit('/education')
               ->assertResponseOk()
               ->see(html_entity_decode(trans('cv-lang::cv.education')));

           $this->actingAs($user)
               ->visit('/education/create')
               ->see(html_entity_decode(trans('cv-lang::cv.school')))
               ->see(html_entity_decode(trans('cv-lang::cv.update')));
       }
   }

   public function testAddEducation(){
       // create an admin user to test with
       $user = factory(App\User::class)->create();
       $user->type = 1;

       // add a job
       $this->actingAs($user)
           ->visit('/education/create')
           ->type('Whatsamatta U', 'school')
           ->type('Somewhere, USA', 'location')
           ->type('MBA', 'degree')
           ->type('testing code', 'major')
           ->type('1994-01-01', 'start_date')
           ->type('1998-01-01', 'end_date')
           ->press(trans('cv-lang::cv.update'))
           ->assertResponseOk();

       // make sure it is in the DB
       $this->seeInDatabase('education', [
           'school' => 'Whatsamatta U',
       ]);

       // make sure it appears on the admin page
       $this->actingAs($user)
           ->visit('/education')
           ->see('testing code');

       // make sure it appears in the actual CV
        $this->visit('cvadmin/preview')
            ->see('Somewhere, USA');
   }

   public function testEditEducation(){
       // create an admin user to test with
       $user = factory(App\User::class)->create();
       $user->type = 1;

       // test page in each language
       $langs = config('cv.langs');
       foreach($langs as $lang) {
           app()->setLocale($lang);

           // add a job
           $education = Education::create([
               'school' => 'Trump University',
               'degree' => 'None',
               'major'  => 'Assholery',
               'start_date' => '2010-01-01',
               'end_date'   => '2010-01-02',
               'location'   => 'NY, NY',
               'lang' => $lang,
           ]);

           // make sure it is updated in the DB
           $this->seeInDatabase('education', [
               'school' => $education->school,
               'lang'  => $lang,
           ]);

           // visit the page
           $this->actingAs($user)
               ->visit('/education/' . $education->id . '/edit')
               ->assertResponseOk()
               ->see($education->major)
               ->see(html_entity_decode(trans('cv-lang::cv.update')))
               ->press(html_entity_decode(trans('cv-lang::cv.update')))
               ->assertResponseOK();

           // make sure job appears on CV
           $this->visit('/cvadmin/preview')
               ->see($education->location);

           // modify the job
           $this->actingAs($user)
               ->visit('/education/' . $education->id . '/edit')
               ->see($education->degree)
               ->type('Testery', 'major')
               ->type('QA', 'degree')
               ->press(html_entity_decode(trans('cv-lang::cv.update')))
               ->assertResponseOk()
               ->see($education->school);

           // make sure it is updated in the DB
           $this->seeInDatabase('education', [
               'major' => 'Testery',
               'degree' => 'QA',
           ]);

           // make sure it is updated on the page
           $this->visit('cvadmin/preview')
               ->see('Testery');

           Education::destroy($education->id);
       }
   }


}

<?php

namespace App;

use App\Project;
use App\Category;
use App\Image;
use App\ProjectToCategory;
use App\ProjectTree;
use App\Category_Project;



class PopulateDatabase 
{

    public function populateData(){
       
        $this->truncateAll();
        $this->populateCategoryData();
        $this->populateProjectData();
        $this->populateImageData();
   

        echo('Data populated');
    }

    public function truncateAll(){
        $Project = new Project();
        $Project->truncate();    
        $Category = new Category();
        $Category->truncate();   
        $Image = new Image();
        $Image->truncate();   
        $Category_Project = new Category_Project();
        $Category_Project->truncate();    
    }

    public function addProjectToCategory($project_id, $category_id ){
        //
        $Category_Project = new Category_Project();
        $Category_Project->category_id = $category_id;
        $Category_Project->project_id = $project_id;
        $Category_Project->save();
    }



    public function populateProjectData(){

         // Highlight projects
        $Project = new Project();
        $Project->id = 1;
        $Project->heading = 'AUDI A4 SPORT';
        $Project->subheading = 'Cooking Doughnuts &amp; Burning Rubber';
        $Project->youtubelink = 'https://www.youtube.com/watch?v=i40CqdbqhyE';
        $Project->detail = '<p>This allowed for unique tracking shots of the car whilst it burned some rubber around a warehouse.</p>
            <p>The frame could only be bolted onto the chassis at two points in the engine bay, so the front section of the frame was held onto the roof by some fancy suction cups.</p>
            <p>The whole rig had to capable of withstanding the huge forces generated by the car doing doughnuts at speed, and the offset weight of the camera swinging way out from the center of gravity sometimes in the opposite direction.</p>';
       
         //Add to highlight
        $this->addProjectToCategory(1, 3);
    

         //Add to special effects
        $this->addProjectToCategory(6, 1);

        $Project->save();


        $Project = new Project();
        $Project->id = 2;
        $Project->heading = 'Little French Lobster';
        $Project->subheading = 'Gourmet stop frame animation';
        $Project->youtubelink = 'https://www.youtube.com/watch?v=qoz4ZpwwNcU';
        $Project->detail = "A little French lobster wearing a boater hat and spectacles???Of course we can make that!!
                We took a real lobster shell and used resin to reinforce it. Then we built ball and socket joint into its claws and legs so it could be used as a stop frame animation  puppet.
                Because the lobster turned red after we&apos;d cooked it, we had to repaint his shell back to how it looked when it was alive.
                Utilizing a seldom used animation technique, the final result is a very charming little character.
                When this little guy was scuttling around on the sea floor, i bet he never dreamed he'd one day be starring in an O2 commercial. Shame he didnt live to see it.";
        //Add to highlight
        $this->addProjectToCategory(2, 3);
        $Project->save();

      

        $Project = new Project();
        $Project->id = 3;
        $Project->heading = 'Sky Fluid Viewing';
        $Project->subheading = 'Lovely liquids and amazing models';
        $Project->youtubelink = 'https://www.youtube.com/watch?v=2_wVR3BVMGA';
        $Project->detail = "Johnny Green&apos;s new campaign for Sky gave us the opportunity to fully exercise a huge array of techniques in model making and fluid dynamics.
             The demand for a new type of liquid movement required extensive testing using various liquids and viscosities on hydrophobic surfaces placed at specific angles, using different pressures and quantities, to bring as much gravity defying life as possible to the liquids. This resulted in the creation of a computer controlled ten-way solenoid valve system. Four of these units were made and were capable of colliding multiple droplets on cue in mid air.
             The liquids aspect of the advert was filmed on a separate shoot day with Machine Shop and The Mill working together to produce specific reference shots. Our system could dictate the size and shape of a droplet, precise gaps between each one and where collisions between them would occur.
            We also 3D designed and printed the various scale models you see throughout this series of adverts.";
        

         //Add to highlight
        $this->addProjectToCategory(3, 3);
        $Project->save();  

        $Project = new Project();
        $Project->id = 4;
        $Project->heading = 'Schwartz';
        $Project->subheading = 'Who said food and Pyro&#39;s dont mix?';
        $Project->youtubelink = '????????';
        $Project->detail = "<p>Sacks of herbs and spices were detonated with phenomenally accurate timing for this advert, whilst being filmed at speeds of up to 2000 fps.</p>
        <p>Each explosion had to fit a sequence which, when slowed down, would exactly match a piece of specially composed music, as well as the movements of a motion control camera.</p>";
       
        //Add to highlight
        $this->addProjectToCategory(4, 3);
         //Add to pirotechnics
        $this->addProjectToCategory(4, 6);
      
        $Project->save();

        $Project = new Project();
        $Project->id = 5;
        $Project->heading = 'Adidas';
        $Project->subheading = 'The Chelsea team are feeling blue';
        $Project->youtubelink = '????????';
        $Project->detail = "";
        //Add to highlight
        $this->addProjectToCategory(5, 3);
        $Project->save();   
 

        $Project = new Project();
        $Project->id = 6;
        $Project->heading = 'Sony 4K TV';
        $Project->subheading = 'Three tonnes of petals made to erupt from a dormant volcano in Central America.';
        $Project->youtubelink = 'https://www.youtube.com/watch?v=oBp-w9Hag9c';
        $Project->detail = '<p>Although widely reported in the media as being common household emulsion, the liquid supplied for this shoot actually consisted of a secret formula known only to the Machine Shop Gungemasters. Members of Chelsea football club interacted with the liquid in a variety of ways, helped by various rigs from our storerooms.</p>
            <p>Click <a href=&quot;http://www.dailymail.co.uk/sport/football/article-2304607/Chelseas-stars-splattered-blue-paint-adidas-kit-advert.html?campaignkw=DailyMailarticle&quot;>here</a> for a collection of stunning photos.</p>
            <p>Fluid consistency and colour can be reliably controlled by adjusting ratios of ingredients, and our purpose built large-volume gunge stirring tank allows easy production of vibrant liquids with excellent physical properties.</p>';
        //Add to highlight
        $this->addProjectToCategory(6, 3);
         //Add to pirotechnics
        $this->addProjectToCategory(6, 6);
        $Project->save();


        //END HIGHLIGHT

        $Project = new Project();
        $Project->id = 7;
        $Project->heading = 'Lexus Quadcopters';
        $Project->subheading = 'Lexus Quadcopters';
        $Project->youtubelink = 'https://www.youtube.com/watch?time_continue=1&v=uj0v1BgzUdc';
        $Project->detail = "<p>Working alongside KMEL Robotics based in Philadelphia Machineshop were involved to engineer the bodywork components and assembly of 36 quadrocopters.</p>
            <p>The shell had to incorporate all of Rogue&apos;s design details and KMEL&apos;s electronics with easy access to batteries and other components whilst being strong enough to take a hard landing or crash. Ideal shell weight was briefed at 25 grams, we came in at 24.5 grams.</p>
            <p>Design engineered, 3D printed, painted with Lexus special water baseed paints and assembled all in house made this just possible within the tight time frame.</p>";
        
        //Add to special effects
        $this->addProjectToCategory(7, 1);
        $Project->save();


        $Project = new Project();
        $Project->id = 8;
        $Project->heading = 'Nest - Tobias Rehberger';
        $Project->subheading = 'Nest - Tobias Rehberger';
        $Project->youtubelink = 'https://www.youtube.com/watch?time_continue=1&v=uj0v1BgzUdc';
        $Project->detail = "<p>Working with artist Tobias Rehberger and his team we were tasked with design engineering through to installation of a huge electrical sculpture to be suspended in the large atrium at Bloomberg headquarters in London, Finsbury Square. </p>
            <p>888 spheres of 3 different sizes were split between 19 clusters. Each cluster was controlled with 4 bespoke control boards which would turn on and off each sphere randomly subject to whether or not someone was logging in and out for the Bloomberg network.</p>
            <p>The clusters were then suspended across 5 of the bridges that connect the floors together in the atrium with all the cabling running through the building to a main control hub. It&apos;s been running flawlessly for the past 3 years and is the main backdrop when filming Bloomberg news from the London offices.</p>";
         //Add to special effects
        $this->addProjectToCategory(8, 1);
        $Project->save();

        $Project = new Project();
        $Project->id = 9;
        $Project->heading = 'Nest - Tobias Rehberger';
        $Project->subheading = 'E_Moot - Art Machine';
        $Project->youtubelink = '';
        $Project->detail = "<p>E_Moot - Art Machine.</p>";
        $Project->save();  
         //Add to special effects
        $this->addProjectToCategory(9, 1);
        $Project->save();

        $Project = new Project();
        $Project->id = 10;
        $Project->heading = 'Toyota Ticklish Car';
        $Project->subheading = 'Toyota Ticklish Car';
        $Project->youtubelink = 'https://www.youtube.com/watch?v=ZxwhtB0BO8c';
        $Project->detail = "<p>For Red Nose Day we partnered with Toyota to make a ticklish car. This was achieved by rigging the car with sensors and hydraulics in order to move and shudder as if it is really being ticked.</p>";
        $Project->save();  
                //Add to special effects
        $this->addProjectToCategory(10, 1);
        $Project->save();

        $Project = new Project();
        $Project->id = 11;
        $Project->heading = 'Nissan Leaf Virtual Test Drive';
        $Project->subheading = 'Nissan Leaf Virtual Test Drive';
        $Project->youtubelink = 'https://www.youtube.com/watch?v=iNiiFp0rv4c';
        $Project->detail = "<p>TRO - the award winning experiential agency behind Nissan&apos;s innovation station at the O2 asked us to assist with a project to create a virtual test drive.  Alongside Setsquare Staging and the team at Projection Artworks we developed the interfacing between the real car and virtual environment.  As you would hope the on-board computer of the Nissan was not fond of the interventions we needed to make, lowering the top speed, reducing the braking force and overriding the rear wheel motion sensors, but our engineers managed to create workarounds so that we could maintain the level of control we required without compromising the cars own safety systems. </p>
            <p>The result is a true team effort and a huge success.  Hundreds of visitors pass through the innovation station every day, and it is a credit to all involved that despite being one of their most complex exhibits, the Nissan Leaf is also one of the most reliable.</p>";
        $Project->save();  
               //Add to special effects
        $this->addProjectToCategory(11, 1);
        $Project->save();

        $Project = new Project();
        $Project->id = 12;
        $Project->heading = 'GKN - Transparent car';
        $Project->subheading = 'GKN - Transparent car';
        $Project->youtubelink = '';
        $Project->detail = "<p>Working with Shelton Fleming we were asked to produce a number of model GKN driveline parts initially for their Shanghai expo. We adapted their CAD to reduce the internal components and unnecessary geometry for an exterior only viewing model then laser sintered the majority of complex parts front nylon and finished them with paint.</p>
            <p>One of the more challenging parts was the 3D contoured car outline made from 50 mm Aluminium tubing designed in a way to breakdown easily for transportation and easy set-up between shows. All non GKN car parts were either made in Aluminium or clear acrylic to not detract away from GKN products.</p>
            <p>Since this initial stand we have continued to supply a number of touring models for GKN as and when required.</p>";
        $Project->save(); 
        //Add to special effects
        $this->addProjectToCategory(12, 1);
        $Project->save();

        $Project = new Project();
        $Project->id = 13;
        $Project->heading = 'Pakpoom Silaphan';
        $Project->subheading = 'Pakpoom Silaphan';
        $Project->youtubelink = '';
        $Project->detail = "<p>This replication of an inflatable toy&apos;s air valve is in fact nearly 60cm wide.  We worked closely with Pakpoom to realise his vision of a perfectly rendered giant valve.  The solid sculpted original was cast in a resin with just enough pliability to allow the valve to be opened and closed but to retain shape in either setting.  </p>";
        $Project->save(); 
        //Add to special effects
        $this->addProjectToCategory(13, 1);
        $Project->save();

        $Project = new Project();
        $Project->id = 14;
        $Project->heading = 'Viking - Giant Louvre';
        $Project->subheading = 'Viking - Giant Louvre';
        $Project->youtubelink = '';
        $Project->detail = "<p>Viking - Giant Louvre</p>";
        $Project->save(); 
         //Add to special effects
        $this->addProjectToCategory(6, 1);
        $Project->save();




        //special project ids 1 4 5 6  7 8 9 10 11



    }


    public function populateCategoryData(){

        $Category = new Category();
        $Category->id = 1; $Category->category = 'Special Effects';  $Category->save();

            $Category = new Category();
            $Category->id = 4; $Category->category = 'Rigs & Floor Effects'; $Category->parentCategory_id = 1; $Category->save();

            $Category = new Category();
            $Category->id = 5; $Category->category = 'Pyrotechnics & Atmospherics'; $Category->parentCategory_id = 1; $Category->save();

            $Category = new Category();
            $Category->id = 6; $Category->category = 'Models & Miniatures'; $Category->parentCategory_id = 1; $Category->save();

            $Category = new Category();
            $Category->id = 7; $Category->category = 'Liquid Effects'; $Category->parentCategory_id = 1; $Category->save();

        $Category = new Category();
        $Category->id = 2; $Category->category = 'Special Projects';   $Category->save();

        $Category = new Category();
        $Category->id = 3; $Category->category = 'Highlight';  $Category->save();

    }      
      


    public function populateImageData(){

        // Insert some stuff
        $Image = new Image();
        $Image->filename = 'big.jpg';
        $Image->type='featured';
        $Image->Project_ID = 1;
        $Image->save();

        // Insert some stuff
        $Image = new Image();
        $Image->filename = 'big.jpg';
        $Image->type='featured';
        $Image->Project_ID = 2;
        $Image->save();

        // Insert some stuff
        $Image = new Image();
        $Image->filename = 'big.jpg';
        $Image->type='featured';
        $Image->Project_ID = 3;
        $Image->save();

        // Insert some stuff
        $Image = new Image();
        $Image->filename = 'big.jpg';
        $Image->type='featured';
        $Image->Project_ID = 4;
        $Image->save();

         // Insert some stuff
        $Image = new Image();
        $Image->filename = 'big.jpg';
        $Image->type='featured';
        $Image->Project_ID = 5;
        $Image->save();

         // Insert some stuff
        $Image = new Image();
        $Image->filename = 'big.jpg';
        $Image->type='featured';
        $Image->Project_ID = 6;
        $Image->save();


    }


}

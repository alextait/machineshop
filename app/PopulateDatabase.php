<?php

namespace App;

use App\DisplayItem;
use App\DisplayItemCategory;
use App\DisplayItemImage;
use App\DisplayItemToCategory;
use App\DisplayItemTree;


class PopulateDatabase 
{

    public function populateData(){
       
        $this->truncateAll();

        $this->populateDisplayItemCategoryData();
        $this->populateDisplayItemData();
        $this->populateDisplayItemImageData();
        $this->populateDisplayItemTreeData();

        echo('Data populated');
    }

    public function truncateAll(){
        $DisplayItem = new DisplayItem();
        $DisplayItem->truncate();    
        $DisplayItemCategory = new DisplayItemCategory();
        $DisplayItemCategory->truncate();   
        $DisplayItemImage = new DisplayItemImage();
        $DisplayItemImage->truncate();   
        $DisplayItemToCategory = new DisplayItemToCategory();
        $DisplayItemToCategory->truncate(); 
        $DisplayItemTree = new DisplayItemTree();
        $DisplayItemTree->truncate(); 
    }

    public function addProjectToCategory($displayitemid, $categoryid){
        $DisplayItemToCategory = new DisplayItemToCategory();

        $DisplayItemToCategory->categoryid = $categoryid;
        $DisplayItemToCategory->displayitemid = $displayitemid;
        $DisplayItemToCategory->save();
    }



    public function populateDisplayItemData(){



         // Highlight projects
        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 1;
        $DisplayItem->heading = 'AUDI A4 SPORT';
        $DisplayItem->subheading = 'Cooking Doughnuts &amp; Burning Rubber';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=i40CqdbqhyE';
        $DisplayItem->detail = 'To achieve the abstract camera angles used in this petrol headed advert. Machine shop built a super lightweight aluminum frame to support a camera crane arm on top of the car itself';
        $DisplayItem->save();

        //Add to highlight
        $this->addProjectToCategory(1, 10);

        //Add to special effects
        $this->addProjectToCategory(1, 4);


        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 2;
        $DisplayItem->heading = 'Little French Lobster';
        $DisplayItem->subheading = 'Gourmet stop frame animation';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=qoz4ZpwwNcU';
        $DisplayItem->detail = "A little French lobster wearing a boater hat and spectacles???Of course we can make that!!
                We took a real lobster shell and used resin to reinforce it. Then we built ball and socket joint into its claws and legs so it could be used as a stop frame animation  puppet.
                Because the lobster turned red after we&apos;d cooked it, we had to repaint his shell back to how it looked when it was alive.
                Utilizing a seldom used animation technique, the final result is a very charming little character.
                When this little guy was scuttling around on the sea floor, i bet he never dreamed he'd one day be starring in an O2 commercial. Shame he didnt live to see it.";
        $DisplayItem->save();

        //Add to highlight
        $this->addProjectToCategory(2, 10);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 3;
        $DisplayItem->heading = 'Sky Fluid Viewing';
        $DisplayItem->subheading = 'Lovely liquids and amazing models';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=2_wVR3BVMGA';
        $DisplayItem->detail = "Johnny Green&apos;s new campaign for Sky gave us the opportunity to fully exercise a huge array of techniques in model making and fluid dynamics.
             The demand for a new type of liquid movement required extensive testing using various liquids and viscosities on hydrophobic surfaces placed at specific angles, using different pressures and quantities, to bring as much gravity defying life as possible to the liquids. This resulted in the creation of a computer controlled ten-way solenoid valve system. Four of these units were made and were capable of colliding multiple droplets on cue in mid air.
             The liquids aspect of the advert was filmed on a separate shoot day with Machine Shop and The Mill working together to produce specific reference shots. Our system could dictate the size and shape of a droplet, precise gaps between each one and where collisions between them would occur.
            We also 3D designed and printed the various scale models you see throughout this series of adverts.";
        $DisplayItem->save();   
        //Add to highlight
        $this->addProjectToCategory(3, 10);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 4;
        $DisplayItem->heading = 'Schwartz';
        $DisplayItem->subheading = 'Who said food and Pyro&#39;s dont mix?';
        $DisplayItem->youtubelink = '????????';
        $DisplayItem->detail = "<p>Sacks of herbs and spices were detonated with phenomenally accurate timing for this advert, whilst being filmed at speeds of up to 2000 fps.</p>
        <p>Each explosion had to fit a sequence which, when slowed down, would exactly match a piece of specially composed music, as well as the movements of a motion control camera.</p>";
        $DisplayItem->save(); 
        //Add to highlight
        $this->addProjectToCategory(4, 10);  
        //Add to pirotechnics
        $this->addProjectToCategory(4, 6);  

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 5;
        $DisplayItem->heading = 'Adidas';
        $DisplayItem->subheading = 'The Chelsea team are feeling blue';
        $DisplayItem->youtubelink = '????????';
        $DisplayItem->detail = "";
        $DisplayItem->save();   
        //Add to highlight
        $this->addProjectToCategory(5, 10);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 6;
        $DisplayItem->heading = 'Sony 4K TV';
        $DisplayItem->subheading = 'Three tonnes of petals made to erupt from a dormant volcano in Central America.';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=oBp-w9Hag9c';
        $DisplayItem->detail = '<p>Although widely reported in the media as being common household emulsion, the liquid supplied for this shoot actually consisted of a secret formula known only to the Machine Shop Gungemasters. Members of Chelsea football club interacted with the liquid in a variety of ways, helped by various rigs from our storerooms.</p>
            <p>Click <a href=&quot;http://www.dailymail.co.uk/sport/football/article-2304607/Chelseas-stars-splattered-blue-paint-adidas-kit-advert.html?campaignkw=DailyMailarticle&quot;>here</a> for a collection of stunning photos.</p>
            <p>Fluid consistency and colour can be reliably controlled by adjusting ratios of ingredients, and our purpose built large-volume gunge stirring tank allows easy production of vibrant liquids with excellent physical properties.</p>';
        $DisplayItem->save();  
        //Add to highlight
        $this->addProjectToCategory(6, 10);
        //Add to pirotechnics
        $this->addProjectToCategory(6, 6);  


        //END HIGHLIGHT

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 7;
        $DisplayItem->heading = 'Lexus Quadcopters';
        $DisplayItem->subheading = 'Lexus Quadcopters';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?time_continue=1&v=uj0v1BgzUdc';
        $DisplayItem->detail = "<p>Working alongside KMEL Robotics based in Philadelphia Machineshop were involved to engineer the bodywork components and assembly of 36 quadrocopters.</p>
            <p>The shell had to incorporate all of Rogue&apos;s design details and KMEL&apos;s electronics with easy access to batteries and other components whilst being strong enough to take a hard landing or crash. Ideal shell weight was briefed at 25 grams, we came in at 24.5 grams.</p>
            <p>Design engineered, 3D printed, painted with Lexus special water baseed paints and assembled all in house made this just possible within the tight time frame.</p>";
        $DisplayItem->save();  

        //Add to special effects
        $this->addProjectToCategory(7, 4);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 8;
        $DisplayItem->heading = 'Nest - Tobias Rehberger';
        $DisplayItem->subheading = 'Nest - Tobias Rehberger';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?time_continue=1&v=uj0v1BgzUdc';
        $DisplayItem->detail = "<p>Working with artist Tobias Rehberger and his team we were tasked with design engineering through to installation of a huge electrical sculpture to be suspended in the large atrium at Bloomberg headquarters in London, Finsbury Square. </p>
            <p>888 spheres of 3 different sizes were split between 19 clusters. Each cluster was controlled with 4 bespoke control boards which would turn on and off each sphere randomly subject to whether or not someone was logging in and out for the Bloomberg network.</p>
            <p>The clusters were then suspended across 5 of the bridges that connect the floors together in the atrium with all the cabling running through the building to a main control hub. It&apos;s been running flawlessly for the past 3 years and is the main backdrop when filming Bloomberg news from the London offices.</p>";
        $DisplayItem->save();  
        //Add to special effects
        $this->addProjectToCategory(8, 4);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 9;
        $DisplayItem->heading = 'Nest - Tobias Rehberger';
        $DisplayItem->subheading = 'E_Moot - Art Machine';
        $DisplayItem->youtubelink = '';
        $DisplayItem->detail = "<p>E_Moot - Art Machine.</p>";
        $DisplayItem->save();  
        //Add to special effects
        $this->addProjectToCategory(9, 4);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 10;
        $DisplayItem->heading = 'Toyota Ticklish Car';
        $DisplayItem->subheading = 'Toyota Ticklish Car';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=ZxwhtB0BO8c';
        $DisplayItem->detail = "<p>For Red Nose Day we partnered with Toyota to make a ticklish car. This was achieved by rigging the car with sensors and hydraulics in order to move and shudder as if it is really being ticked.</p>";
        $DisplayItem->save();  
        //Add to special effects
        $this->addProjectToCategory(10, 4);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 11;
        $DisplayItem->heading = 'Nissan Leaf Virtual Test Drive';
        $DisplayItem->subheading = 'Nissan Leaf Virtual Test Drive';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=iNiiFp0rv4c';
        $DisplayItem->detail = "<p>TRO - the award winning experiential agency behind Nissan&apos;s innovation station at the O2 asked us to assist with a project to create a virtual test drive.  Alongside Setsquare Staging and the team at Projection Artworks we developed the interfacing between the real car and virtual environment.  As you would hope the on-board computer of the Nissan was not fond of the interventions we needed to make, lowering the top speed, reducing the braking force and overriding the rear wheel motion sensors, but our engineers managed to create workarounds so that we could maintain the level of control we required without compromising the cars own safety systems. </p>
            <p>The result is a true team effort and a huge success.  Hundreds of visitors pass through the innovation station every day, and it is a credit to all involved that despite being one of their most complex exhibits, the Nissan Leaf is also one of the most reliable.</p>";
        $DisplayItem->save();  
        //Add to special effects
        $this->addProjectToCategory(11, 4);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 12;
        $DisplayItem->heading = 'GKN - Transparent car';
        $DisplayItem->subheading = 'GKN - Transparent car';
        $DisplayItem->youtubelink = '';
        $DisplayItem->detail = "<p>Working with Shelton Fleming we were asked to produce a number of model GKN driveline parts initially for their Shanghai expo. We adapted their CAD to reduce the internal components and unnecessary geometry for an exterior only viewing model then laser sintered the majority of complex parts front nylon and finished them with paint.</p>
            <p>One of the more challenging parts was the 3D contoured car outline made from 50 mm Aluminium tubing designed in a way to breakdown easily for transportation and easy set-up between shows. All non GKN car parts were either made in Aluminium or clear acrylic to not detract away from GKN products.</p>
            <p>Since this initial stand we have continued to supply a number of touring models for GKN as and when required.</p>";
        $DisplayItem->save(); 
        //Add to special effects
        $this->addProjectToCategory(12, 4);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 13;
        $DisplayItem->heading = 'Pakpoom Silaphan';
        $DisplayItem->subheading = 'Pakpoom Silaphan';
        $DisplayItem->youtubelink = '';
        $DisplayItem->detail = "<p>This replication of an inflatable toy&apos;s air valve is in fact nearly 60cm wide.  We worked closely with Pakpoom to realise his vision of a perfectly rendered giant valve.  The solid sculpted original was cast in a resin with just enough pliability to allow the valve to be opened and closed but to retain shape in either setting.  </p>";
        $DisplayItem->save(); 
        //Add to special effects
        $this->addProjectToCategory(13, 4);

        $DisplayItem = new DisplayItem();
        $DisplayItem->displayitemid = 14;
        $DisplayItem->heading = 'Viking - Giant Louvre';
        $DisplayItem->subheading = 'Viking - Giant Louvre';
        $DisplayItem->youtubelink = '';
        $DisplayItem->detail = "<p>Viking - Giant Louvre</p>";
        $DisplayItem->save(); 
        //Add to special effects
        $this->addProjectToCategory(14,4);





        //special project ids 1 4 5 6  7 8 9 10 11



    }


    public function populateDisplayItemCategoryData(){

        // Insert some stuff
        $DisplayItemCategory = new DisplayItemCategory();
        $DisplayItemCategory->categoryid = 1;  $DisplayItemCategory->category = 'News';  $DisplayItemCategory->save();

        $DisplayItemCategory = new DisplayItemCategory();
        $DisplayItemCategory->categoryid = 2; $DisplayItemCategory->category = 'Staff'; $DisplayItemCategory->save();

        $DisplayItemCategory = new DisplayItemCategory();
        $DisplayItemCategory->categoryid = 3; $DisplayItemCategory->category = 'Projects'; $DisplayItemCategory->save();

            $DisplayItemCategory = new DisplayItemCategory();
            $DisplayItemCategory->categoryid = 4; $DisplayItemCategory->category = 'Special Effects'; $DisplayItemCategory->save();
   
                $DisplayItemCategory = new DisplayItemCategory();
                $DisplayItemCategory->categoryid = 5; $DisplayItemCategory->category = 'Rigs & Floor Effects'; $DisplayItemCategory->save();

                $DisplayItemCategory = new DisplayItemCategory();
                $DisplayItemCategory->categoryid = 6; $DisplayItemCategory->category = 'Pyrotechnics & Atmospherics'; $DisplayItemCategory->save();

                $DisplayItemCategory = new DisplayItemCategory();
                $DisplayItemCategory->categoryid = 7; $DisplayItemCategory->category = 'Models & Miniatures'; $DisplayItemCategory->save();

                $DisplayItemCategory = new DisplayItemCategory();
                $DisplayItemCategory->categoryid = 8; $DisplayItemCategory->category = 'Liquid Effects'; $DisplayItemCategory->save();


            $DisplayItemCategory = new DisplayItemCategory();
            $DisplayItemCategory->categoryid = 9; $DisplayItemCategory->category = 'Special Projects'; $DisplayItemCategory->save();

            $DisplayItemCategory = new DisplayItemCategory();
            $DisplayItemCategory->categoryid = 10; $DisplayItemCategory->category = 'Highlight'; $DisplayItemCategory->save();


    }      
      
    public function populateDisplayItemTreeData(){
        $DisplayItemTree = new DisplayItemTree();
        $DisplayItemTree->parentid = 0;  $DisplayItemTree->childid = 1;  $DisplayItemTree->save();
        $DisplayItemTree = new DisplayItemTree();
        $DisplayItemTree = new DisplayItemTree();
        $DisplayItemTree->parentid = 0;  $DisplayItemTree->childid = 2;  $DisplayItemTree->save();
         $DisplayItemTree = new DisplayItemTree();
        $DisplayItemTree->parentid = 0;  $DisplayItemTree->childid = 3;  $DisplayItemTree->save();
            $DisplayItemTree = new DisplayItemTree();
            $DisplayItemTree->parentid = 3;  $DisplayItemTree->childid = 4;  $DisplayItemTree->save();
                $DisplayItemTree = new DisplayItemTree();
                $DisplayItemTree->parentid = 4;  $DisplayItemTree->childid = 5;  $DisplayItemTree->save();
                $DisplayItemTree = new DisplayItemTree();
                $DisplayItemTree->parentid = 4;  $DisplayItemTree->childid = 6;  $DisplayItemTree->save();
                $DisplayItemTree = new DisplayItemTree();
                $DisplayItemTree->parentid = 4;  $DisplayItemTree->childid = 7;  $DisplayItemTree->save();
                $DisplayItemTree = new DisplayItemTree();
                $DisplayItemTree->parentid = 4;  $DisplayItemTree->childid = 8;  $DisplayItemTree->save();
            $DisplayItemTree = new DisplayItemTree();
            $DisplayItemTree->parentid = 3;  $DisplayItemTree->childid = 9;  $DisplayItemTree->save();    
            $DisplayItemTree = new DisplayItemTree();
            $DisplayItemTree->parentid = 3;  $DisplayItemTree->childid = 10;  $DisplayItemTree->save();
    }


    public function populateDisplayItemImageData(){

        // Insert some stuff
        $DisplayItemImage = new DisplayItemImage();
        $DisplayItemImage->filename = 'screen-shot-2016-08-11-at-164319.png';
        $DisplayItemImage->main = true;
        $DisplayItemImage->displayitemID = 1;
        $DisplayItemImage->save();

        // Insert some stuff
        $DisplayItemImage = new DisplayItemImage();
        $DisplayItemImage->filename = 'untitled-1.jpg';
        $DisplayItemImage->main = true;
        $DisplayItemImage->displayitemID = 2;
        $DisplayItemImage->save();

        // Insert some stuff
        $DisplayItemImage = new DisplayItemImage();
        $DisplayItemImage->filename = '6-jpeg.jpg';
        $DisplayItemImage->main = true;
        $DisplayItemImage->displayitemID = 3;
        $DisplayItemImage->save();

        // Insert some stuff
        $DisplayItemImage = new DisplayItemImage();
        $DisplayItemImage->filename = '6-jpeg.jpg';
        $DisplayItemImage->main = true;
        $DisplayItemImage->displayitemID = 4;
        $DisplayItemImage->save();

         // Insert some stuff
        $DisplayItemImage = new DisplayItemImage();
        $DisplayItemImage->filename = '6-jpeg.jpg';
        $DisplayItemImage->main = true;
        $DisplayItemImage->displayitemID = 5;
        $DisplayItemImage->save();

         // Insert some stuff
        $DisplayItemImage = new DisplayItemImage();
        $DisplayItemImage->filename = '6-jpeg.jpg';
        $DisplayItemImage->main = true;
        $DisplayItemImage->displayitemID = 6;
        $DisplayItemImage->save();


    }


}

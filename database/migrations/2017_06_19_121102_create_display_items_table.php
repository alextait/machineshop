<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\DisplayItem;

class CreateDisplayItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displayitems', function (Blueprint $table) {
            $table->increments('displayItemID');
            $table->timestamps();
            $table->string('heading')->default('');
            $table->string('subheading')->default('');
            $table->string('youtubelink')->default('');
            $table->text('detail')->nullable();
        });

        // Insert some stuff
        $DisplayItem = new DisplayItem();
        $DisplayItem->heading = 'AUDI A4 SPORT';
        $DisplayItem->subheading = 'Cooking Doughnuts &amp; Burning Rubber';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=i40CqdbqhyE';
        $DisplayItem->detail = 'To achieve the abstract camera angles used in this petrol headed advert. Machine shop built a super lightweight aluminum frame to support a camera crane arm on top of the car itself';
        $DisplayItem->save();

        $DisplayItem = new DisplayItem();
        $DisplayItem->heading = 'Little French Lobster';
        $DisplayItem->subheading = 'Gourmet stop frame animation';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=i40CqdbqhyE';
        $DisplayItem->detail = "A little French lobster wearing a boater hat and spectacles???Of course we can make that!!
                We took a real lobster shell and used resin to reinforce it. Then we built ball and socket joint into its claws and legs so it could be used as a stop frame animation  puppet.
                Because the lobster turned red after we'd cooked it, we had to repaint his shell back to how it looked when it was alive.
                Utilizing a seldom used animation technique, the final result is a very charming little character.
                When this little guy was scuttling around on the sea floor, i bet he never dreamed he'd one day be starring in an O2 commercial. Shame he didnt live to see it.";
        $DisplayItem->save();

        $DisplayItem = new DisplayItem();
        $DisplayItem->heading = 'Sky Fluid Viewing';
        $DisplayItem->subheading = 'Lovely liquids and amazing models';
        $DisplayItem->youtubelink = 'https://www.youtube.com/watch?v=i40CqdbqhyE';
        $DisplayItem->detail = "Johnny Green's new campaign for Sky gave us the opportunity to fully exercise a huge array of techniques in model making and fluid dynamics.
             The demand for a new type of liquid movement required extensive testing using various liquids and viscosities on hydrophobic surfaces placed at specific angles, using different pressures and quantities, to bring as much gravity defying life as possible to the liquids. This resulted in the creation of a computer controlled ten-way solenoid valve system. Four of these units were made and were capable of colliding multiple droplets on cue in mid air.
             The liquids aspect of the advert was filmed on a separate shoot day with Machine Shop and The Mill working together to produce specific reference shots. Our system could dictate the size and shape of a droplet, precise gaps between each one and where collisions between them would occur.
            We also 3D designed and printed the various scale models you see throughout this series of adverts.";
        $DisplayItem->save();    




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('displayitems');
    }
}

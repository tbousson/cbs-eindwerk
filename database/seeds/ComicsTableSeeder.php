<?php

use Illuminate\Database\Seeder;

class ComicsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comics')->delete();
        
        \DB::table('comics')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Seven to Eternity vol.1 - The God of Whispers',
                'description' => 'The God of Whispers has spread an omnipresent paranoia to every corner of the kingdom of Zhal;
his spies hide in every hall spreading mistrust and fear. Adam Osidis, a dying knight from a disgraced house, 
must choose between joining a hopeless order of magical warriors and mercenaries in their desperate bid to free their world of the evil God,
or accepting the God\'s promise to give Adam everything he\'s ever dreamed of.

All men have surrendered their freedom for fear; now one last free man must choose between the fate of the world and his own heart\'s desire. 

Writer Rick Remender re-teams with collaborators Jerome Opeña (Uncanny X-Force, Fear Agent)
and Matt Hollingsworth (Tokyo Ghost, Wyches) to take readers on a hard road through the strange and mind-bending fantasy world of Zhal.',
                'author_id' => 1,
                'serie_id' => 1,
                'publisher_id' => 1,
                'photo_id' => 0,
                'publishyear' => 2017,
                'price' => 15,
                'stock' => 1,
                'created_at' => '2019-04-20 21:24:05',
                'updated_at' => '2019-04-21 13:28:06',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Seven to Eternity vol.2 - Ballad of Betrayal',
                'description' => 'Adam Osidis and the Mosak travel the blasted lands of Zhal to deliver the Mud King to the only force strong enough to 
undo his strangle hold on his army of mind slaves. But the Mud King isn\'t called "the God of Whispers" for nothing, and his poison
runs deep, so deep even as to affect the Mosak. The choices they make here will echo throughout the lands of Zhal for all eternity.

RICK REMENDER & JEROME OPENA\'s dark fantasy smash hit series returns for its second chapter!

Collects SEVEN TO ETERNITY #5-9 ',
                'author_id' => 1,
                'serie_id' => 1,
                'publisher_id' => 1,
                'photo_id' => 0,
                'publishyear' => 2017,
                'price' => 20,
                'stock' => 3,
                'created_at' => '2019-04-20 21:24:05',
                'updated_at' => '2019-04-21 13:28:06',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Seven to Eternity vol.3 - Rise to Fall',
                'description' => 'Adam Osidis walks a veiled path strewn with impossible choices and heartbreaking compromise.
Between Adam and the cure for his wasting disease lies the Skylord Volmer and his thirst for revenge on The God of Whispers.
Adam must now protect the man who murdered his father,
but to what lengths will he go to achieve it? RICK REMENDER and JEROME OPEÑA bring the first chapter of the world of Zhal to a bone-chilling conclusion. Collects SEVEN TO ETERNITY #10-13',
                'author_id' => 1,
                'serie_id' => 1,
                'publisher_id' => 1,
                'photo_id' => 0,
                'publishyear' => 2019,
                'price' => 25,
                'stock' => 5,
                'created_at' => '2019-04-20 21:24:05',
                'updated_at' => '2019-04-21 13:28:06',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Preacher vol.1 - Gone to Texas',
                'description' => 'One of the most celebrated comics titles of the late 1990s, PREACHER is a modern American epic of life, death, love and redemption also packed with sex, booze, blood and bullets - not to mention angels, demons, God, vampires and deviants of all stripes.

At first glance, the Reverend Jesse Custer doesn\'t look like anyone special-just another small-town minister slowly losing his flock and his faith. But he\'s about to come face-to-face with proof that God does indeed exist. Merging with a bizarre spiritual force called Genesis, Jesse now possesses the power of "the Word," an ability to make people do whatever he utters. He begins a violent and riotous journey across the country in search of answers from the elusive deity.',
                'author_id' => 2,
                'serie_id' => 3,
                'publisher_id' => 3,
                'photo_id' => 0,
                'publishyear' => 1996,
                'price' => 10,
                'stock' => 3,
                'created_at' => '2019-04-28 19:38:23',
                'updated_at' => '2019-04-28 19:38:23',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Preacher vol. 2 - Until the End of the World',
                'description' => 'Continuing the new editions of the classic PREACHER trade paperbacks! This volume contains PREACHER #8-17.

In this continuing saga of the bizarre life of a faithless Texas preacher, Jesse Custer heads to the south to confront the extremely dysfunctional family that abused him as a child and planted the original seeds of his disillusionment with the world. Now merged with a half angelic, half demonic being, the former preacher looks to exact revenge against those who simultaneously raised and destroyed him. Then after exorcising his personal demons, Jesse, his girlfriend Tulip, and their friend Cassidy, the Irish vampire, head west to a party of Babylonian proportions.',
                'author_id' => 2,
                'serie_id' => 3,
                'publisher_id' => 3,
                'photo_id' => 0,
                'publishyear' => 1997,
                'price' => 10,
                'stock' => 1,
                'created_at' => '2019-04-28 19:40:44',
                'updated_at' => '2019-04-28 19:40:44',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Preacher, Vol.3: Proud Americans',
                'description' => 'Preacher Jesse Custer continues his dark journey to find God, accompanied by his gun-toting girlfriend and Irish vampire buddy.In the continuing saga of the bizarre adventures of faithless Texas preacher Jesse Custer, Jesse, along with his girlfriend Tulip and their friend Cassidy, the Irish vampire, head down South in hopes of recovering from their encounter with the forces of the Grail. But during their planned down time Jesse must face off against an enraged Arseface, who seeks to avenge his father’s death, while Tulip deals with Cassidy’s startling declaration of love for her. Also includes a special story spotlighting the Saint of Killers and the story of Cassidy’s first and only encounter with his fellow vampires.',
                'author_id' => 2,
                'serie_id' => 3,
                'publisher_id' => 3,
                'photo_id' => 1,
                'publishyear' => 1997,
                'price' => 15,
                'stock' => 5,
                'created_at' => '2019-06-04 15:30:00',
                'updated_at' => '2019-06-04 15:30:00',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
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
                'photo_id' => 1,
                'publishyear' => 2017,
                'price' => 15,
                'stock' => 1,
                'created_at' => '2019-04-20 21:24:05',
                'updated_at' => '2019-06-04 20:53:36',
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

Collects SEVEN TO ETERNITY #5-9',
                'author_id' => 1,
                'serie_id' => 1,
                'publisher_id' => 1,
                'photo_id' => 2,
                'publishyear' => 2017,
                'price' => 20,
                'stock' => 3,
                'created_at' => '2019-04-20 21:24:05',
                'updated_at' => '2019-06-05 00:47:34',
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
                'photo_id' => 3,
                'publishyear' => 2019,
                'price' => 25,
                'stock' => 5,
                'created_at' => '2019-04-20 21:24:05',
                'updated_at' => '2019-06-05 00:48:32',
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
                'photo_id' => 4,
                'publishyear' => 1996,
                'price' => 10,
                'stock' => 3,
                'created_at' => '2019-04-28 19:38:23',
                'updated_at' => '2019-06-05 00:48:47',
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
                'photo_id' => 5,
                'publishyear' => 1997,
                'price' => 10,
                'stock' => 1,
                'created_at' => '2019-04-28 19:40:44',
                'updated_at' => '2019-06-05 00:49:12',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'Preacher vol. 3 - Proud Americans',
                'description' => 'Preacher Jesse Custer continues his dark journey to find God, accompanied by his gun-toting girlfriend and Irish vampire buddy.In the continuing saga of the bizarre adventures of faithless Texas preacher Jesse Custer, Jesse, along with his girlfriend Tulip and their friend Cassidy, the Irish vampire, head down South in hopes of recovering from their encounter with the forces of the Grail. But during their planned down time Jesse must face off against an enraged Arseface, who seeks to avenge his father’s death, while Tulip deals with Cassidy’s startling declaration of love for her. Also includes a special story spotlighting the Saint of Killers and the story of Cassidy’s first and only encounter with his fellow vampires.',
                'author_id' => 2,
                'serie_id' => 3,
                'publisher_id' => 3,
                'photo_id' => 6,
                'publishyear' => 1997,
                'price' => 15,
                'stock' => 5,
                'created_at' => '2019-06-04 15:30:00',
                'updated_at' => '2019-06-05 00:49:49',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'Preacher vol. 4 - Ancient History',
                'description' => 'Four distinctive characters whose lives were forever changed by encounters with Preacher\'s Jesse Custer take center stage in this volume. Included: The Saint of Killers, telling the origin of this troubled, violent figure from the Old West, and The Story of You-Know-Who, in which a disaffected loser tries to escape the influence of his abusive sheriff father with tragic, yet comical, results, and more.',
                'author_id' => 2,
                'serie_id' => 3,
                'publisher_id' => 3,
                'photo_id' => 7,
                'publishyear' => 1998,
                'price' => 10,
                'stock' => 1,
                'created_at' => '2019-06-05 08:12:34',
                'updated_at' => '2019-06-05 08:12:34',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'Preacher vol. 5 - Dixie Fried',
                'description' => 'A new edition of the trade paperback featuring PREACHER #28-33. In the fifth installment of the Preacher saga, Jesse, his girlfriend Tulip, and their vampire friend Cassidy head down South in hopes of recovering from their encounter with the forces of the Grail. But during their planned "down time" Jesse must face off against an enraged Arseface who seeks to avenge his father\'s death, while Tulip deals with Cassidy\'s startling declaration of love for her. As a bonus, this edition also includes the story of Cassidy\'s first and only adventure with a fellow vampire.',
                'author_id' => 2,
                'serie_id' => 3,
                'publisher_id' => 3,
                'photo_id' => 8,
                'publishyear' => 1998,
                'price' => 15,
                'stock' => 1,
                'created_at' => '2019-06-05 08:16:45',
                'updated_at' => '2019-06-05 08:16:45',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'Black Gas',
                'description' => 'A tiny little island off the East Coast of America, that sits on its own tiny little fault on the underlying tectonic plate. An odd little history ignored by almost everyone... until the night of the big storm, and the crack in the fault line, and the release of something foul from the earth\'s guts, blown across the little town of Smoky Island. And the only two people on the island who were outside its reach are now trapped on a black spit of rock with a population who aren\'t people anymore - they started eating each other an hour ago!',
                'author_id' => 3,
                'serie_id' => 2,
                'publisher_id' => 2,
                'photo_id' => 9,
                'publishyear' => 2003,
                'price' => 12,
                'stock' => 5,
                'created_at' => '2019-06-05 08:19:42',
                'updated_at' => '2019-06-05 08:19:42',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'Revival vol. 1 - You\'re Among Friends TP',
                'description' => 'For one day in rural central Wisconsin, the dead came back to life. Now it\'s up to Officer Dana Cypress to deal with the media scrutiny, religious zealots, and government quarantine that has come with them. In a town where the living have to learn to deal with those who are supposed to be dead, Officer Cypress must solve a brutal murder, and everyone, alive or undead, is a suspect. The sell-out hit series created by NYT Bestselling author TIM SEELEY and Eisner winning artist MIKE NORTON is collected with bonus material! Collects REVIVAL 1-5 and the FREE COMIC BOOK DAY short story.',
                'author_id' => 4,
                'serie_id' => 5,
                'publisher_id' => 1,
                'photo_id' => 10,
                'publishyear' => 2012,
                'price' => 13,
                'stock' => 3,
                'created_at' => '2019-06-05 08:46:49',
                'updated_at' => '2019-06-05 08:46:49',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Revival vol. 2 - Live Like You Mean It TP',
                'description' => 'For one day in rural central Wisconsin, the dead came back to life. Now the living and the recently returned struggle to maintain a sense of normalcy, amidst political and religious conflicts. Collects REVIVAL #6-11.',
                'author_id' => 4,
                'serie_id' => 5,
                'publisher_id' => 1,
                'photo_id' => 11,
                'publishyear' => 2013,
                'price' => 12,
                'stock' => 3,
                'created_at' => '2019-06-05 08:49:36',
                'updated_at' => '2019-06-05 08:49:36',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'Revival vol. 3 - A Faraway Place TP',
                'description' => 'Collects REVIVAL #12-17

For one day in rural central Wisconsin, the dead came back to life. Now the living and the recently returned struggle to maintain a sense of normalcy amidst political and religious conflicts. Officer Dana Cypress is hot on the trail of a man she believes may have murdered her sister Em, but Em herself is on a quest through the snowy woods to find the strange glowing creature that haunts a child.',
                'author_id' => 4,
                'serie_id' => 5,
                'publisher_id' => 1,
                'photo_id' => 12,
                'publishyear' => 2014,
                'price' => 15,
                'stock' => 3,
                'created_at' => '2019-06-05 08:50:51',
                'updated_at' => '2019-06-05 08:50:51',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'Revival vol. 4 - Escape to Wisconsin TP',
                'description' => 'For one day in rural central Wisconsin, the dead came back to life. Now it\'s up to Officer Dana Cypress to deal with the media scrutiny, religious zealots, and government quarantine that has come with them. Now, as Dana closes in on the bizarre murderer of her Reviver sister, she\'s swept up in a conspiracy that will bring her from rural Wisconsin to New York City! The sell-out hit series created by New York Times Bestselling writer TIM SEELEY and Eisner-winning artist MIKE NORTON is collected with bonus material! Collects REVIVAL #18-23 & CHEW/REVIVAL #1',
                'author_id' => 4,
                'serie_id' => 5,
                'publisher_id' => 1,
                'photo_id' => 13,
                'publishyear' => 2014,
                'price' => 17,
                'stock' => 9,
                'created_at' => '2019-06-05 08:52:03',
                'updated_at' => '2019-06-05 08:52:03',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}
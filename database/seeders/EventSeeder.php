<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        $events = [
            [
                'name' => 'COMEDY NIGHT',
                'description' => 'You can run, but you can’t escape the laughs! The wait is finally over, 2 days to Comedy Night. 😸\n🗓️ : 19th October, Saturday\n⏰ : 6:00 PM - Onwards\n📍 : 100 Courtyard, SZABIST\n🎟️ : Students: 600/- || Alumni: 1000/-.',
                'image' => 'https://docs.szabist.edu.pk/websites/images/Photo%20Gallery/2023/September/Comedy%20night/02.jpg',
            ],
            [
                'name' => 'FUNKAR FEST',
                'description' => 'A celebration of the arts, and Shugal Mela, an ode to community spirit, lit up Welcome Week with creativity, care, and lasting moments! Huge shoutout to the Arts & Culture and Community Service pillars for pulling off their incredible events ✨.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRsyAWTfRAXbthGSnyLFP9eRcdX6UVyIfsw-Q&s.jpg',
            ],
            [
                'name' => 'POWER PLAY',
                'description' => 'Power Play had the field on fire while Cyber Clash lit up the screens! ⚽🎮 Whether you were scoring goals online or offline, freshers brought nothing but energy and skills.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0HTE4fFcSsImtc3MhkDAIYQRfrmPfzVeGlQ&s.jpg',
            ],
            [
                'name' => 'FallFrenzyWeek',
                'description' => 'Announcing our diverse vendors’ lineup for Fall Frenzy Week! 📣 We’ve got art, dessert, jewellery and more! Be sure to stop by, explore, and grab something special. See you all there! ✨.',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPS_gceyYOqYHq_SQr7MOfIDvkCwZCbc74Rw&s.jpg',
            ],
        ];

        // Insert the events into the events table
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}


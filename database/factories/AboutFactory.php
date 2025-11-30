<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'phone'=>'+237 694011998',
            'email'=>'brtankoua@gmail.com',
            'title1'=>'Je me nomme Brecht Tankoua',
            'desc1'=>'<p>En tant que travailleur en Freelance proposants les services (Programmation web, Marketing digital &amp; Infographie), mon parcours diversifi&eacute; m&#39;a permis d&#39;appliquer mes talents dans diff&eacute;rents domaines (E-commerce, Industrie, BTP, Immobilier, etc..) faisant preuve d&#39;adaptabilit&eacute; et de polyvalence.</p>',
            'exp_count'=>3,
            'proj_count'=>50,
            'hcust_count'=>35,
            'ucust_count'=>null,
            'facebook_link'=>'https://web.facebook.com/agencedigitals/',
            'instagram_link'=>'https://www.instagram.com/bertholdtankoua/',
            'linkeldin_link'=>'https://www.linkedin.com/in/brecht-tankoua-80b311279/',
            'gitlab_link'=>'https://gitlab.com/Brecht_tankoua',
            'about_img'=>'upload/abouts/1793084709060324.webp',
            'img_url'=> 'http://127.0.0.1:8000/upload/abouts/1793084709060324.webp',
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Project::updateOrCreate(
            ['slug' => 'aed'],
            [
                'title' => 'Appui aux Entreprises en Difficultés (AED)',
                'type' => 'aed',
                'subtitle' => 'Projet Appui aux Entreprises en Difficultés',
                'description' => "Les effets conjoncturels engendrés par la crise de la COVID-19 et son corollaire de mesures restrictives, renforcés par la guerre russo-ukrainienne, ont ouvert le champ à plusieurs difficultés au niveau des secteurs économiques de la Côte d'Ivoire.

En effet, bon nombre d'entreprises locales ont dû se résoudre au ralentissement économique, imposé par les effets post COVID-19 et à l'inflation suscitée par la guerre russo-ukrainienne.

Ces difficultés ont conduit plusieurs opérateurs économiques à réduire le champ de leurs activités et laissent certaines firmes dans un état de vulnérabilité qui nécessite l'action de la politique publique.

Pour apporter les solutions à ces difficultés rencontrées par les entreprises, le Ministère du Commerce et de l'Industrie, propose dans le cadre du Fonds de Restructuration et de Mise à Niveau des entreprises industrielles (FREMIN) des mesures de soutien aux entreprises en difficulté en vue de la relance de leurs activités.

De façon spécifique, il s'agira de :
• Identifier les entreprises en difficulté
• Réaliser un diagnostic global et stratégique au profit des entreprises en difficulté identifiées
• Proposer des mesures et actions visant à renforcer la compétitivité des entreprises en difficulté",
                'image' => 'assets/img/aed.jpg',
            ]
        );

        \App\Models\Project::updateOrCreate(
            ['slug' => 'zone-industrielle'],
            [
                'title' => 'Mise en Place Infrastructure Zone Industrielle',
                'type' => 'zone',
                'subtitle' => 'Projet de Mise en Place Infrastructure Zone Industrielle',
                'description' => "Dans le cadre du renforcement de la compétitivité des industries à travers la mise en place des infrastructures industrielles, l'Etat de Côte d'Ivoire et la société Arise Ivoire ont signé une convention le 14 juin 2022. Cette convention porte sur la réalisation des amenées primaires du site d'Akoupé-Zeudji, PK24 et la réalisation les travaux de réhabilitation des zones industrielles de Koumassi et Vridi.

La mise en place de ce projet revêt une importance stratégique pour la transformation structurelle de notre économie et la compétitivité industrielle de la Côte d'Ivoire. A cet effet, le Ministère du Commerce et de l'Industrie, à travers le Fonds de Restructuration et de Mise à Niveau des entreprises industrielles « FREMIN » est chargé d'assurer la réalisation de ces travaux, il s'agira de façon spécifique de :

• Réaliser les travaux de l'électricité de 5 MW de la zone industrielle d'Akoupé-Zeudji PK24
• Assurer la maîtrise d'œuvre Electricité 5 MW (Convention CI-ENERGIES)
• Installer l'électricité de 35 MW de la zone industrielle d'Akoupé-Zeudji PK24
• Réaliser les travaux de voirie nervure centrale de la zone industrielle d'Akoupé-Zeudji PK24
• Assurer la maîtrise d'œuvre Voirie nervure centrale (Convention BNETD)
• Réaliser les Travaux d'eau potable de la zone industrielle d'Akoupé-Zeudji PK24
• Assurer la maîtrise d'œuvre eau potable (convention ONEP)
• Réaliser les travaux de réhabilitation de la zone industrielle de Vridi
• Réaliser les travaux de réhabilitation de la zone industrielle de Koumassi",
                'image' => 'assets/img/zone-industrielle.jpg',
            ]
        );
    }
}

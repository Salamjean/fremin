<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Qu\'est-ce que le FREMIN ?',
                'answer' => 'Le FREMIN (Fonds de Restructuration et de Mise à Niveau) est un instrument de l\'État de Côte d\'Ivoire destiné à appuyer les entreprises industrielles dans leur processus de mise à niveau et de développement.',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Qui peut bénéficier du programme ?',
                'answer' => 'Les entreprises industrielles et de services liés à l\'industrie, légalement constituées en Côte d\'Ivoire, peuvent bénéficier des programmes du FREMIN sous réserve de respecter les critères d\'éligibilité.',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Comment soumettre un dossier ?',
                'answer' => 'Les dossiers peuvent être soumis directement au siège du FREMIN ou via notre plateforme en ligne. Consultez la section "Programmes" pour plus de détails sur les documents requis.',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'question' => 'Quels sont les types d\'accompagnement proposés ?',
                'answer' => 'Le FREMIN propose des appuis techniques (diagnostics, formations, assistance technique) et des appuis financiers (garanties, participation au financement d\'investissements matériels et immatériels).',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Services\IngredientGroupService;
use App\Services\IngredientService;
use App\Services\StepGroupService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PdfController extends Controller
{

    protected IngredientGroupService $ingredientGroupService;
    protected StepGroupService $stepGroupService;
    protected IngredientService $ingredientService;

    public function __construct() {
        $this->ingredientService = new IngredientService();
        $this->ingredientGroupService = new IngredientGroupService();
        $this->stepGroupService = new StepGroupService();
    }

    public function generatePdf(Request $request)
    {
        $recipeIds = $request->recipes;
        $pdfContent = '';
        $data = file_get_contents('images/pdf1.png');
        $data1 = file_get_contents('images/pdf2.png');
        $base64 = 'data:image/png;base64,' . base64_encode($data);
        $base641 = 'data:image/png;base64,' . base64_encode($data1);

        $pdfContent .= '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style>@page { margin: 0px; } body { background-image: url("' . $base64 . '"); background-size: cover; background-position: center center; margin: 0; padding: 0; font-family: "Montserrat", sans-serif; } td {font-family: "Montserrat", sans-serif; vertical-align: top; } h3 { font-size: 24px; color: #56924C; line-height: 32px; text-align: left; margin-bottom: 15px; } p, h5 {font-family: "Montserrat", sans-serif; font-size: 16px; color: #2E4765; line-height: 20px; font-weight: 400; margin-bottom: 4px; !important; } h5 {font-size: 18px; font-weight: 700;} p strong {font-family: "Montserrat", sans-serif; font-weight: 700; }</style></head><body></body></html>';

        foreach ($recipeIds as $id) {
            $recipe = Recipe::find($id);

            if($recipe->old_recipe == 1) {
                $ingredients = $this->ingredientService->getIngredientsOld($recipe->id);
            } else {
                $ingredientGroups = $this->ingredientGroupService->getGroupsByRecipeId($recipe->id);
                $stepGroups = $this->stepGroupService->getGroupsByRecipeId($recipe->id);
            }

            $pageHtml = '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><style>@font-face { font-family: "Montserrat"; font-style: normal; font-weight: 400; src: url(https://fonts.gstatic.com/s/montserrat/v14/JTURjIg1_i6t8kCHKm45_ZpC3gnD-w.ttf) format("truetype"); }body.body-bg {background-image: url(' . $base641 . '); background-size: cover; background-position: center center; padding: 100px 40px 60px;font-family: "Montserrat", sans-serif !important;}</style></head>';
            $pageHtml .= '<body class="body-bg">';
            $pageHtml .= '<table style="width: 100%"><tr>';
            $pageHtml .= '<td style="width: 30%; border-right: 1px solid #2E4765;"><div><h3>Osnovne informacije</h3><p><strong>Vreme pripreme</strong><br>' . $recipe->preparation_time . '</p><p><strong>Težina pripreme</strong><br>' . $recipe->difficulty . '</p><p><strong>Broj porcija</strong><br>' . $recipe->portion_number . '</p><h3>Sastojci</h3>';
            if($recipe->old_recipe == 1) {
                foreach ($ingredients as $ingredient) {
                    if($ingredient->type == 1) {
                        $pageHtml .= '<p>' . $ingredient->title . '</p>';
                    } else {
                        $pageHtml .= '<h5>' . $ingredient->title . '</h5>';
                    }
                }
            } else {
                foreach ($ingredientGroups as $key => $items) {
                    $pageHtml .= '<h5>' . $key . '</h5>';
                    foreach ($items as $item) {
                        $pageHtml .= '<p>' . $item['title'] . '</p>';
                    }
                }
                foreach ($recipe->ingredients as $ingredient) {
                    if($ingredient->group == null) {
                        $pageHtml .= '<p>' . $ingredient->title . '</p>';
                    }
                }
            }
            $pageHtml .= '</div></td>';
            $pageHtml .= '<td style="width: 70%; padding-left: 50px;"><div><h1 style="font-size: 41px; font-weight: 700; line-height: 48px; color: #2E4765; margin-bottom: 35px;">' . $recipe->title . '</h1><h3>Opis recepta</h3><p>' . $recipe->description . '</p>';
            if($recipe->old_recipe == 0) {
                $pageHtml .= '<h3>Kako se priprema?</h3>';
                foreach ($stepGroups as $key => $items) {
                    $pageHtml .= '<h5>' . $key . '</h5>';
                    foreach ($items as $item) {
                        $pageHtml .= '<p>' . $item['title'] . '</p>';
                    }
                }
                foreach ($recipe->steps as $step) {
                    if($step->group == null) {
                        $pageHtml .= '<p>' . $step->title . '</p>';
                    }
                }
            }
            $pageHtml .= '</div></td>';
            $pageHtml .= '</tr></table>';
            $pageHtml .= '</body></html>';
            $pdfContent .= $pageHtml;
        }

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('margin_top', 0);
        $options->set('margin_bottom', 0);
        $options->set('margin_left', 0);
        $options->set('margin_right', 0);

        $dompdf = new Dompdf($options);

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->loadHtml(mb_convert_encoding($pdfContent, 'HTML-ENTITIES', 'UTF-8'));
        $dompdf->render();

        return $dompdf->stream('Moja_C_Knjižica_Recepata.pdf');
    }
}

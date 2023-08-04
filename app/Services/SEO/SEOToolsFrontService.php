<?php

namespace App\Services\SEO;

use App\Models\SEOTool;
use App\Models\Setting;
use App\Services\SEO\SEOToolsService;
use Illuminate\Database\Eloquent\Model;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

class SEOToolsFrontService extends SEOToolsService
{
    /**
     * Render SEO tools of the specefied resource
     *
     * @param Model $model
     * @return bool
     */
    public function render(Model $model) : bool
    {
        if($model instanceof Setting) {

            if($seotool = SEOTool::where('is_for_setting', true)->first()) {

                $this->renderOGSettingsInputs($seotool);
                $this->renderTwitterSettingsInputs($seotool);

                return true;
            }

        } else {

            if(isset($model->seotool)) {

                $this->renderOGInputs($model);
                $this->renderTwitterInputs($model);

                return true;
            }
        }

        return false;
    }

    /**
     * Start Open Graph Rendering
     *
     * @param Model $model
     * @return void
     */
    private function renderOGInputs(Model $model) : void
    {
        OpenGraph::setType($model->seotool->og_type);
        OpenGraph::setTitle($model->seotool->og_title);
        OpenGraph::setUrl($model->seotool->og_url);
        OpenGraph::addImage(asset($model->seotool->og_image));
        OpenGraph::setDescription($model->seotool->og_description);
    }

    /**
     * Start Twitter Card Rendering
     *
     * @param Model $model
     * @return void
     */
    private function renderTwitterInputs(Model $model) : void
    {
        TwitterCard::addValue('card', $model->seotool->twitter_card);
        TwitterCard::setTitle($model->seotool->twitter_title);
        TwitterCard::setSite($model->seotool->twitter_site);
        TwitterCard::setDescription($model->seotool->twitter_description);
        // TwitterCard::addImage(asset($model->seotool->twitter_image));
        TwitterCard::addValue('image', asset($model->seotool->twitter_image));
        TwitterCard::addValue('image:alt', $model->seotool->twitter_image_alt);
    }

    /**
     * Start Open Graph Rendering
     *
     * @param Model $model
     * @return void
     */
    private function renderOGSettingsInputs(SEOTool $seotool) : void
    {
        OpenGraph::setType($seotool->og_type);
        OpenGraph::setTitle($seotool->og_title);
        OpenGraph::setUrl($seotool->og_url);
        OpenGraph::addImage(asset($seotool->og_image));
        OpenGraph::setDescription($seotool->og_description);
    }

    /**
     * Start Twitter Card Rendering
     *
     * @param Model $model
     * @return void
     */
    private function renderTwitterSettingsInputs(SEOTool $seotool) : void
    {
        TwitterCard::addValue('card', $seotool->twitter_card);
        TwitterCard::setTitle($seotool->twitter_title);
        TwitterCard::setSite($seotool->twitter_site);
        TwitterCard::setDescription($seotool->twitter_description);
        // TwitterCard::addImage(asset($model->seotool->twitter_image));
        TwitterCard::addValue('image', asset($seotool->twitter_image));
        TwitterCard::addValue('image:alt', $seotool->twitter_image_alt);
    }
}

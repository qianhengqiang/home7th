<?php

namespace App\Presenters\Building;

use App\Transformers\Building\BuildingTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BuildingPresenter.
 *
 * @package namespace App\Presenters\Building;
 */
class BuildingPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BuildingTransformer();
    }
}

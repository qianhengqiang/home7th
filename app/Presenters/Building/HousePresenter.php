<?php

namespace App\Presenters\Building;

use App\Transformers\Building\HouseTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class HousePresenter.
 *
 * @package namespace App\Presenters\Building;
 */
class HousePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HouseTransformer();
    }
}

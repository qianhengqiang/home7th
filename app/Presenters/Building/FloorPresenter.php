<?php

namespace App\Presenters\Building;

use App\Transformers\Building\FloorTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FloorPresenter.
 *
 * @package namespace App\Presenters\Building;
 */
class FloorPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FloorTransformer();
    }
}

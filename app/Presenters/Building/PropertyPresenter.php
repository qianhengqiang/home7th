<?php

namespace App\Presenters\Building;

use App\Transformers\Building\PropertyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PropertyPresenter.
 *
 * @package namespace App\Presenters\Building;
 */
class PropertyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PropertyTransformer();
    }
}

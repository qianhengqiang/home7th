<?php

namespace App\Presenters;

use App\Transformers\RenterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RenterPresenter.
 *
 * @package namespace App\Presenters;
 */
class RenterPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RenterTransformer();
    }
}

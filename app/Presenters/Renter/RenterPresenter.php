<?php

namespace App\Presenters\Renter;

use App\Transformers\Renter\RenterTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class RenterPresenter.
 *
 * @package namespace App\Presenters\Renter;
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

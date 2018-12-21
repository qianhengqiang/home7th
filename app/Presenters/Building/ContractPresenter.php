<?php

namespace App\Presenters\Building;

use App\Transformers\Building\ContractTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContractPresenter.
 *
 * @package namespace App\Presenters\Building;
 */
class ContractPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContractTransformer();
    }
}

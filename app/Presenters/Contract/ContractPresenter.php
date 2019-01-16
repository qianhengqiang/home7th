<?php

namespace App\Presenters\Contract;

use App\Transformers\Contract\ContractTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ContractPresenter.
 *
 * @package namespace App\Presenters\Contract;
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

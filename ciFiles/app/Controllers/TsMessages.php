<?php

namespace App\Controllers;

use App\Models\TsModel;
use App\Controllers\PageLoader;


class TsMessages extends BaseController
{

    public function update()
    {
        $tsModel = new TsModel();
        $updated = $tsModel->update(1,
            array(
            "messages" => $this->request->getPost("tsMessages")
            )
        );
        return redirect()->to(site_url("manage-top-strip-messages"));
    }

}
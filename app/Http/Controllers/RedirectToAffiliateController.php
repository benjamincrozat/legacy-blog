<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class RedirectToAffiliateController extends Controller
{
    public function __invoke(Request $request, string $slug) : RedirectResponse
    {
        $parameters = $request->all();

        switch ($slug) {
            case 'cloudways':
                $parameters['id'] = '1242932';

                $redirect = 'https://www.cloudways.com/en/';

                break;
            case 'digitalocean':
                $redirect = 'https://m.do.co/c/58bbdf89fc72';

                break;
            case 'fathom-analytics':
                $redirect = 'https://usefathom.com/ref/JTPOCN';

                break;
            case 'kinsta':
                $parameters['kaid'] = 'AEFAUTRRTINA';

                $redirect = 'https://kinsta.com';

                break;
            case 'jasper':
                $parameters['fpr'] = 'benjamin57';

                $redirect = 'https://jasper.ai/?fpr=benjamin57';

                break;
            case 'vultr':
                $parameters['ref'] = '9270910-8H';

                $redirect = 'https://www.vultr.com/';

                break;
            case 'wp-engine':
                $parameters['afftrack'] = '';
                $parameters['d'] = '969073';
                $parameters['m'] = '41388';
                $parameters['u'] = '3391214';

                $redirect = 'https://shareasale.com/u.cfm';

                break;
            default:
                abort(404);
        }

        $queryString = http_build_query($parameters);

        return redirect()->away("$redirect?$queryString");
    }
}

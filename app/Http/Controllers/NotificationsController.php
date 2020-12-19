<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index() {
        $notifications = Notification::all();

        $tz_object = new DateTimeZone('Europe/Istanbul');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);

        $now = $datetime->format('Y-m-d\ h:i:s');
        $data = date_diff(date_create($notifications[0]->effectiveDate), date_create($now));

        if ($data->y == 0 && $data->m == 0 && $data->d == 0 && $data->h == 0) {
            toastr()->warning('Bildirimin süresi doldu!');
            return view('example');
            die();
        }

        else {
            $yil = $data->y;
            $ay = $data->m;
            $gun = $data->d;
            $saat = $data->h;
            $dakika = $data->i;
            $saniye = $data->s;

            $mesaj = $yil . " yıl " . $ay . " ay " . $gun . " gun " . $saat . " saat " . $dakika . " dakika " . $saniye . " saniye " . "kaldı.";

            toastr()->success($mesaj, 'Kalan zaman ');
            return view('example');
            die();
        }

        // Set a warning toast, with no title
        //toastr()->warning('My name is Inigo Montoya. You killed my father, prepare to die!')

        // Set a success toast, with a title
        //toastr()->success('Have fun storming the castle!', 'Miracle Max Says')
    }
}

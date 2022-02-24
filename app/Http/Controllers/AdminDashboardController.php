<?php

namespace App\Http\Controllers;

use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends \crocodicstudio\crudbooster\controllers\CBController
{

    public function getIndex()
    {
        // main variable
        $year = (request('year') ?? date('Y'));
        $month = (request('month') ?? date('m'));
        $statistic = $this->visitorStatistic($year, $month);

        return $this->view('page.admin.dashboard', [
            'month' => (request('month') ?? date('m')),
            'year' => (request('year') ?? date('Y')),
            'page_title' => 'Dashboard',
            'total_subscribe' => number_format(DB::table('email_subscribe')->count(), 0, '.', '.'),
            'total_contact_us' => number_format(DB::table('contact_us')->count(), 0, '.', '.'),
            'total_regional_request' => number_format(DB::table('region_request')->count(), 0, '.', '.'),
            'statistic_label' => $statistic['labels'],
            'statistic_data' => $statistic['data'],
        ]);
    }

    private function visitorStatistic($year, $month)
    {
        $temp = [];
        $labels = [];
        $data = [];
        $list_date = $this->listDate($year, $month);
        $visitor = $this->visitorByFilter($year, $month);

        foreach ($list_date as $key => $value) {
            $temp[$key] = (isset($visitor[$key]) ? $visitor[$key] : $value);

            $labels[] = "" . $key;
            $data[] = "" . (isset($visitor[$key]) ? $visitor[$key] : $value);
        }

        return [
            'tmp' => $temp,
            'labels' => json_encode($labels),
            'data' => json_encode($data)
        ];
    }

    private function visitorByFilter($year, $month)
    {
        $result = [];
        $data = DB::table('visitor_counter')
            ->whereYear('date', $year)
            ->whereMonth('date', $month)
            ->orderBy('date', 'ASC')
            ->get();

        foreach ($data as $row) {
            $date = (int)date('d', strtotime($row->date));
            $result[$date] = $row->total;
        }

        return $result;
    }

    private function listDate($year, $month)
    {
        $result = [];
        $last_date = (int)date("t", strtotime($year . '-' . $month));

        for ($i = 1; $i <= $last_date; $i++) {
            $result[$i] = 0;
        }

        return $result;
    }

    public function cbInit()
    {
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->table                = "cms_users";
        $this->title_field         = "name";
        $this->limit               = 20;
        $this->orderby             = "id,desc";
        $this->show_numbering      = FALSE;
        $this->global_privilege    = FALSE;
        $this->button_table_action = TRUE;
        $this->button_action_style = "button_icon";
        $this->button_add          = TRUE;
        $this->button_delete       = TRUE;
        $this->button_edit         = TRUE;
        $this->button_detail       = TRUE;
        $this->button_show         = TRUE;
        $this->button_filter       = TRUE;
        $this->button_export       = FALSE;
        $this->button_import       = FALSE;
        $this->button_bulk_action  = TRUE;
        $this->sidebar_mode           = "normal"; //normal,mini,collapse,collapse-mini
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col = [];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form = [];
        # END FORM DO NOT REMOVE THIS LINE

    }
}

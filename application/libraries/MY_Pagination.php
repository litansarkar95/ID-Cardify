<?php defined("BASEPATH") or exit("No direct script access allowed");

class MY_Pagination {
    protected $CI;
    protected $per_page = 10;
    protected $total_rows = 0;
    protected $current_page = 1;
    protected $total_pages = 1;
    protected $action = "";
    protected $label = 'records';
    protected $page_field = "page";
    protected $per_page_field = "per_page";

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library("security");
    }

    public function initialize($config = []) {
        if (isset($config["action"])) {
            $this->action = $config["action"];
        }
        if (isset($config["page_field"])) {
            $this->page_field = $config["page_field"];
        }
        if (isset($config["per_page_field"])) {
            $this->per_page_field = $config["per_page_field"];
        }
        if (isset($config['label'])) {
            $this->label = $config['label'];
        }

        $per_page_input = $this->CI->input->post($this->per_page_field);
        if ($per_page_input) {
            $this->per_page = max(1, (int) $per_page_input);
        } elseif (isset($config["per_page"])) {
            $this->per_page = max(1, (int) $config["per_page"]);
        }

        if (isset($config["total_rows"])) {
            $this->total_rows = max(0, (int) $config["total_rows"]);
        }

        $this->total_pages = $this->total_rows > 0 ? (int) ceil($this->total_rows / $this->per_page) : 1;

        $page = (int) $this->CI->input->post($this->page_field);
        if ($page < 1) {
            $page = 1;
        }
        if ($page > $this->total_pages) {
            $page = $this->total_pages;
        }
        $this->current_page = $page;

        return $this;
    }

    public function current_page() { return $this->current_page; }
    public function per_page() { return $this->per_page; }
    public function total_rows() { return $this->total_rows; }
    public function total_pages() { return $this->total_pages; }
    public function offset() { return ($this->current_page - 1) * $this->per_page; }
    public function start() { return $this->total_rows <= 0 ? 0 : $this->offset() + 1; }
    public function end() { return min($this->offset() + $this->per_page, $this->total_rows); }

    protected function csrf_field() {
        if (!isset($this->CI->security)) {
            return "";
        }
        $name = $this->CI->security->get_csrf_token_name();
        $hash = $this->CI->security->get_csrf_hash();
        return '<input type="hidden" name="' . html_escape($name) . '" value="' . html_escape($hash) . '">';
    }

    protected function page_range() {
        $total = $this->total_pages;
        $current = $this->current_page;

        if ($total <= 6) {
            $pages = [];
            for ($i = 1; $i <= $total; $i++) {
                $pages[] = $i;
            }
            return $pages;
        }

        $pages = [];
        if ($current > 3) {
            $pages[] = 1;
            $pages[] = "dots";
        } else {
            $pages[] = 1;
            $pages[] = 2;
            $pages[] = 3;
        }

        for ($i = max(2, $current - 1); $i <= min($total - 1, $current + 1); $i++) {
            if (!in_array($i, $pages)) {
                $pages[] = $i;
            }
        }

        if ($current < $total - 2) {
            if (end($pages) !== "dots") {
                $pages[] = "dots";
            }
            $pages[] = $total;
        } else {
            if (!in_array($total - 2, $pages)) $pages[] = $total - 2;
            if (!in_array($total - 1, $pages)) $pages[] = $total - 1;
            if (!in_array($total, $pages)) $pages[] = $total;
        }

        return array_unique($pages);
    }

    protected function page_link_html($page, $label, $class = "", $disabled = false) {
        if ($disabled) {
            return '<a href="#" class="disabled" onclick="return false;">' . $label . '</a>';
        }

        $page = (int) $page;
        $action = html_escape($this->action);
        $page_field = html_escape($this->page_field);
        $per_page_field = html_escape($this->per_page_field);
        $per_page = (int) $this->per_page;
        $active_class = ($class !== "") ? ' class="' . $class . '"' : '';

        $js_click = "document.getElementById('globalPaginationForm').{$page_field}.value='{$page}'; document.getElementById('globalPaginationForm').submit(); return false;";

        return '<a href="#"' . $active_class . ' onclick="' . $js_click . '">' . $label . '</a>';
    }

    public function create_links() {
        if ($this->total_rows <= 0) {
            return "";
        }

        $html = '';

        // Previous Button
        if ($this->current_page <= 1) {
            $html .= '<a href="#" class="disabled" onclick="return false;"><i class="bi bi-chevron-left"></i></a>';
        } else {
            $html .= $this->page_link_html($this->current_page - 1, '<i class="bi bi-chevron-left"></i>');
        }

        // Page Numbers & Dots
        foreach ($this->page_range() as $page) {
            if ($page === "dots") {
                $html .= '<a href="#" onclick="return false;">&hellip;</a>';
                continue;
            }

            if ($page == $this->current_page) {
                $html .= $this->page_link_html($page, $page, "on", false);
            } else {
                $html .= $this->page_link_html($page, $page, "", false);
            }
        }

        // Next Button
        if ($this->current_page >= $this->total_pages) {
            $html .= '<a href="#" class="disabled" onclick="return false;"><i class="bi bi-chevron-right"></i></a>';
        } else {
            $html .= $this->page_link_html($this->current_page + 1, '<i class="bi bi-chevron-right"></i>');
        }

        return $html;
    }

    public function get_data() {
        return array(
            'total_rows' => $this->total_rows(),
            'per_page' => $this->per_page(),
            'current_page' => $this->current_page(),
            'offset' => $this->offset(),
            'start' => $this->start(),
            'end' => $this->end(),
            'pagination' => $this->create_links(),
            'label' => $this->label
        );
    }
}
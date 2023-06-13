<?php
namespace App\Http\Controllers\Admin\Products;

use App\Extra\Forms\Admin\SizeForm;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    protected $route_base = "admin.products.size";

    /**
     * @desc set controller name
     */
    public $controller = "Size";

    /**
     * @desc set page title
     */
    public $title = "Size";

    public $model = Size::class;

    /**
     * MenuController constructor.
     */

    public function __construct() {
        parent::__construct();

        $this->_data["breadcrumb"] = [
            "Website" => route("admin.website.index"),
            $this->controller => route($this->routes["index"]),
        ];

    }


    /**
     * @method listing
     * @desc prepare data to send react view
     * @param Request $request
     * @return array
     */
    public function listing(Request $request) {
        $filter_data = $request->all();
        $limit = isset($filter_data['limit']) ? $filter_data['limit'] : $this->limit;
        $query = Size::query();

        // add filter in records
        searching_string($query, $request->form);

        // sort records
        db_sort($query, $request);
        $data = $query->paginate($limit);

        $this->_data['data'] = $data;

        return $this->_data;
    }


    /**
     * show create form
     *
     * @method create
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $this->_data["breadcrumb"]["Create"] =  "javascript:void(0)";
        $this->_data["form"] = new SizeForm;
        return view(load_view(), $this->_data);
    }


    /**
     * store new records
     *
     * @method store
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) {
        $request->validate(SizeForm::rules());
        $data = $request->all();
        $store = $this->model::create($data);
        if($store) {
           $request->session()->flash('success', $this->success_response);
        } else {
           $request->session()->flash('error', $this->error_response);
        }
        return redirect()->to(route($this->routes["index"]));
    }


    /**
     * show edit form
     *
     * @method edit
     * @param Size $size
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Size $size) {
        $this->_data["breadcrumb"]["Update"] =  "javascript:void(0)";
        $this->_data["data"] = $size;
        $this->_data["form"] = new SizeForm($size);
        $this->_data["categories"] = menu_parent_list();
        return view(load_view(), $this->_data);
    }


    /**
     * update information
     *
     * @method update
     * @param Request $request
     * @param Size $size
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Size $size) {
        $request->validate(SizeForm::rules());
        $data = $request->except("_token");
        $update = $size->update($data);
        
        if($update) {
           $request->session()->flash('success', $this->update_response);
        } else {
           $request->session()->flash('error', $this->error_response);
        }
        return redirect()->to(route($this->routes["index"]));
    }

}

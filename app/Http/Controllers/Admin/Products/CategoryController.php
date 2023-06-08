<?php
namespace App\Http\Controllers\Admin\Products;

use App\Extra\Forms\Admin\CategoryForm;
use App\Http\Controllers\Controller;
use App\Model\Taluka;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $route_base = "admin.products.category";

    /**
     * @desc set controller name
     */
    public $controller = "Category";

    /**
     * @desc set page title
     */
    public $title = "Category";

    public $model = Category::class;

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
        $query = Category::with('parent');

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
        $this->_data["form"] = new CategoryForm;
        $this->_data["categories"] = menu_parent_list();
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
        $request->validate(CategoryForm::rules());
        $data = $request->all();
        if($request->hasFile('file')) {
            $data["image"] = upload_file("file", 'categories');
        }
        if($data['parent_id'] == 0) {
            $data['parent_id'] = null;
        }
        $store = Category::create($data);
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
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Category $category) {
        $this->_data["breadcrumb"]["Update"] =  "javascript:void(0)";
        $this->_data["data"] = $category;
        $this->_data["form"] = new CategoryForm($category);
        $this->_data["categories"] = menu_parent_list();
        return view(load_view(), $this->_data);
    }


    /**
     * update information
     *
     * @method update
     * @param Request $request
     * @param Category $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category) {
        $request->validate(CategoryForm::rules());
        $data = $request->except("_token");
        $update = $category->update($data);
        if($request->hasFile('file')) {
            $data["image"] = upload_file("file", 'categories');
        }
        if($data['parent_id'] == 0) {
            $data['parent_id'] = null;
        }
        
        if($update) {
           $request->session()->flash('success', $this->update_response);
        } else {
           $request->session()->flash('error', $this->error_response);
        }
        return redirect()->to(route($this->routes["index"]));
    }

}

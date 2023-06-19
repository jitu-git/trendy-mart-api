<?php
namespace App\Http\Controllers\Admin\Products;

use App\Extra\Forms\Admin\ProductForm;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $route_base = "admin.products.product";

    /**
     * @desc set controller name
     */
    public $controller = "Product";

    /**
     * @desc set page title
     */
    public $title = "Product";

    public $model = Product::class;

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
        $query = Product::with('category');

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
        $this->_data["form"] = new ProductForm;
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
        $request->validate(ProductForm::rules());
        #dd($request->all());
        $data = $request->all();
        $store = Product::create($data);
        $store->storeSize($request->sizes);
        $store->storeColor($request->colors);
        $images = [];
        if($request->hasFile('images')) {
            $files = request()->file('images');
            foreach($files as $file)
            $images[] = _upload($file,  "product/{$store->id}");
        }
        $store->storeImages($images);
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
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product) {
        $this->_data["breadcrumb"]["Update"] =  "javascript:void(0)";
        $this->_data["data"] = $product;
        $this->_data["form"] = new ProductForm($product);
        $this->_data["categories"] = menu_parent_list();
        return view(load_view(), $this->_data);
    }


    /**
     * update information
     *
     * @method update
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product) {
        $request->validate(ProductForm::rules());
        $data = $request->except("_token");
        $update = $product->update($data);
        
        if($update) {
           $request->session()->flash('success', $this->update_response);
        } else {
           $request->session()->flash('error', $this->error_response);
        }
        return redirect()->to(route($this->routes["index"]));
    }

}

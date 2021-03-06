<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function __construct() {
        
    }
    public function newcategory(Request $request) {

        if ($request->isMethod('post')) {
           
            $objCategory = new Category();
            $result = $objCategory->addCategory($request);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Category created successfully.';
                $return['redirect'] = route('category-list');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Category already exist.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'New category | Brot';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'category.js');
        $data['funinit'] = array('Category.add()');
        $data['header'] = array(
            'title' => 'Add New category',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Add New category' => 'category'));
        return view('admin.pages.category.addcategory', $data);
    }
    public function categorylist(Request $request) {
        
        $objCategory = new Category();
        $data['result'] = $objCategory->getCategory();
        $data['title'] = 'Category List | Brot';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'category.js');
        $data['funinit'] = array('Category.init()');
        $data['header'] = array(
            'title' => 'Category List',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Category List' => 'category'));
        return view('admin.pages.category.viewcategory', $data);
    }
    public function editcategory(Request $request, $id) {
        
        if ($request->isMethod('post')) {
            $objCategory = new Category();
            $result = $objCategory->editCategory($request, $id);
            if ($result) {
                $return['status'] = 'success';
                $return['message'] = 'Category Edited successfully.';
                $return['redirect'] = route('category-list');
            } else {
                $return['status'] = 'error';
                $return['message'] = 'Category already exist.';
            }
            echo json_encode($return);
            exit;
        }
        $data['title'] = 'Edit Category | Brot';
        $data['css'] = array();
        $data['plugincss'] = array();
        $data['pluginjs'] = array('jquery.validate.min.js');
        $data['js'] = array('ajaxfileupload.js', 'jquery.form.min.js', 'category.js');
        $data['funinit'] = array('Category.edit()');
        $data['header'] = array(
            'title' => 'Update Category',
            'breadcrumb' => array(
                'Dashboard' => 'dashboard',
                'Update Category' => 'Update-Category'));
        $objCategory = new Category();
        $data['result'] = $objCategory->getCategoryDetail($request, $id);
        return view('admin.pages.category.updatecategory', $data);
    }
    public function categoryajaxaction(Request $request) {

        $action = $request->input('action');
        switch ($action) {
            case 'deleteCategory':
                $data = $request->input('data');
                $objCategory = new Category();
                $result = $objCategory->deleteCategory($data);  
                if ($result) {
                    $return['status'] = 'success';
                    $return['message'] = 'Category deleted successfully.';
                    $return['redirect'] = route('category-list');
                } else {
                    $return['status'] = 'error';
                    $return['message'] = 'Category Not Deleted';
                }

                return json_encode($return);
                break;
            case 'deleteDemo':
                $result = $this->deleteDemo($request->input('data'));
                break;
        }
    }
}

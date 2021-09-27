<?php /** @noinspection UnknownColumnInspection */


namespace App\Http\Controllers\PropertiesCategories;


use App\Helpers\ArrayHelper;
use App\Helpers\Files;
use App\Helpers\ResultGenerate;
use App\Helpers\StringHelper;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\PropertiesCategories\PropertiesCategories;
use App\Models\PropertiesCategories\PropertiesCategoriesValues;
use App\Models\Subcategories;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class PropertiesCategoriesController extends Controller
{

    public string $storagePath = 'img/property-categories';
    public string $storageDriver = 'local';

    public function PropertiesCategoriesAdminPage()
    {
        $allPropertiesCategories = PropertiesCategories::all();
        return view('administration.properties-categories.index', [
            'allPropertiesCategories' => $allPropertiesCategories
        ]);
    }

    public function CreatePropertyCategoriesAdminPage()
    {
        return view('administration.properties-categories.create');
    }

    public function EditPropertyCategoriesAdminPage(Request $request)
    {
        $categoryID = !empty($request->category_id) ? $request->category_id : null;

        if ($categoryID) {
            $category = Categories::findOrFail($categoryID);
            return view('administration.properties-categories.edit', [
                'category' => $category
            ]);
        }

        return abort(404);
    }

    public function SavePropertyCategories(Request $request)
    {
        $propertyCategoriesId = !empty($request->property_categories_id) ? $request->property_categories_id : null;
        $propertyCategoriesTitle = !empty($request->property_categories_title) ? $request->property_categories_title : null;
        $propertyCategoriesValues = !empty($request->property_categories_values[0]) ? $request->property_categories_values : null;

        if (!$propertyCategoriesValues && !$propertyCategoriesId) {
            return ResultGenerate::Error('Ошибка! Заполните хотя бы одно значение!');
        }

        if (!$propertyCategoriesTitle) {
            return ResultGenerate::Error('Ошибка! Название не может быть пустым!');
        }

        $fields['title'] = $propertyCategoriesTitle;

        if ($propertyCategoriesId) {
//            $foundPropertyCategories = PropertiesCategories::find($categoryID);
//            if ($foundPropertyCategories) {
//                $updatedCategory = $foundCategory->update($fields);
//                if ($updatedCategory) {
//                    return ResultGenerate::Success('Категория обновлена успешно!');
//                }
//                return ResultGenerate::Error('Ошибка обновления категории!');
//            }

        } else {
            $createdPropertyCategories = PropertiesCategories::create($fields);
            if ($createdPropertyCategories) {
                foreach ($propertyCategoriesValues as $propertyCategoriesValue) {
                    $createdPropertyCategoriesValues = PropertiesCategoriesValues::create([
                        'properties_categories_id' => $createdPropertyCategories->id,
                        'value' => $propertyCategoriesValue,
                    ]);
                }
                return ResultGenerate::Success('Свойство создано успешно!');
            }
            return ResultGenerate::Error('Ошибка создания свойства!');
        }
        return ResultGenerate::Error('Непредвиденная ошибка. Попробуйте позже или обратитесь в поддержку!');
    }

    public function DeletePropertyCategories(Request $request)
    {
        $deleteCategory = Categories::find($request->category_id);
        if ($deleteCategory->Subcategories->count() !== 0) {
            return ResultGenerate::Error('Ошибка! На категорию ссылаются подкатегории!');
        }
        if ($deleteCategory->delete()) {
            return ResultGenerate::Success('Категория успешно удалена!');
        }
        return ResultGenerate::Error('Ошибка удаления категории!');
    }

}

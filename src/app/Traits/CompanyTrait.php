<?php

namespace App\Traits;

use App\Models\Company;

trait CompanyTrait
{

    public function companySearch($request)
    {
        //Search Request
        $keyword = "";

        //Query Parameter
        $category = 0;

        //Query Init
        $isCategory = isset($request['category']) && $request['category'] != '0';
        $isKeyword = isset($request['keyword']) && $request['keyword'] != null;
        $hasSearch = $isCategory || $isKeyword;

        // Start Search
        $companies = Company::query()->orderBy('created_at', 'DESC');

        if ( $isKeyword ){
            $keyword = $request['keyword'];
            $fuzzySearch = "%$keyword%";

            $companies = $companies->where(function($query) use ($fuzzySearch) {

                $query->where('email', 'like binary', $fuzzySearch)
                // Company Name
                ->orWhere('company_name', 'like binary', $fuzzySearch)
                ->orWhere('company_name_kana', 'like binary', $fuzzySearch)
                // Representative Name
                ->orWhere('representative_last_name', 'like binary', $fuzzySearch)
                ->orWhere('representative_last_name_kana', 'like binary', $fuzzySearch)
                ->orWhere('representative_first_name', 'like binary', $fuzzySearch)
                ->orWhere('representative_first_name_kana', 'like binary', $fuzzySearch)
                // Responsible Person Name
                ->orWhere('responsible_person_last_name', 'like binary', $fuzzySearch)
                ->orWhere('responsible_person_last_name_kana', 'like binary', $fuzzySearch)
                ->orWhere('responsible_person_first_name', 'like binary', $fuzzySearch)
                ->orWhere('responsible_person_first_name_kana', 'like binary', $fuzzySearch)
                // Address
                ->orWhere('address1', 'like binary', $fuzzySearch)
                ->orWhere('address2', 'like binary', $fuzzySearch);
            });
        }
        if( $isCategory ){
            if( $request['category'] == '1' ){
                $category = 1;
                $isCategory = "1";
            }elseif( $request['category'] == '2'){
                $category = 2;
                $isCategory = "2";
            }

            $companies = $companies->where('category', $category);
        }

        //Paginate
        $companies = $companies->paginate(7);

        if($hasSearch){
            $companies->appends(['category' => $isCategory, 'keyword' => $keyword]);
        }
        return [
            'companies' => $companies,
            'queries' => ['category' => $isCategory, 'keyword' => $keyword]
        ];
    }

}

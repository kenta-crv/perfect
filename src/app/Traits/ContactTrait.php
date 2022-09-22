<?php
namespace App\Traits;

use App\Models\Contact;

trait ContactTrait
{
    /**
     * Process Search Request on Quiz, (1: Live, 2:NoLive, 3:Battle)
     *
     * @param Array $request
     * @param Integer $category_id
     * @return Array $result
     */
    public function contactSearch($request)
    {
        //Search Request
        $keyword = "";

        //Query Init
        $isStatus = isset($request['status']) && $request['status'] != '0';
        $isKeyword = isset($request['keyword']) && $request['keyword'] != null;
        $hasSearch = $isStatus || $isKeyword;

        // Start Search
        $contacts = Contact::orderBy('created_at', 'desc');

        if ( $isKeyword ){
            $contactsOrWhereBody = Contact::orderBy('created_at', 'desc');
            $contactsOrWhereName = Contact::orderBy('created_at', 'desc');
            $contactsOrWhereLastName = Contact::orderBy('created_at', 'desc');
            $keyword = $request['keyword'];
            $fuzzySearch = "%$keyword%";
            $contactsOrWhereBody = $contactsOrWhereBody->where('body', 'like binary', $fuzzySearch);
            $contactsOrWhereName = $contactsOrWhereName->where('first_name', 'like binary', $fuzzySearch);
            $contactsOrWhereLastName = $contactsOrWhereLastName->where('last_name', 'like binary', $fuzzySearch);
            // $contacts = $contacts->where('last_name', 'like binary', $fuzzySearch);
        }

        if( $isStatus ){
            if( $request['status'] == '1' ) {
                $status = 1;
                $isStatus = "1";
            } elseif ( $request['status'] == '2') {
                $status = 2;
                $isStatus = "2";
            } elseif ( $request['status'] == '3') {
                $status = 3;
                $isStatus = "3";
            }

            $contacts = $contacts->where('status', $status);

            if($isKeyword){
                $contactsOrWhereBody->where('status', $status);
                $contactsOrWhereName->where('status', $status);
                $contactsOrWhereLastName->where('status', $status);
            }
        }

        if(isset($contactsOrWhereBody) && isset($contactsOrWhereName) && isset($contactsOrWhereLastName)) {
            $contacts = $contactsOrWhereBody->union($contactsOrWhereName)->union($contactsOrWhereLastName)->paginate(14);
        }else{
            $contacts = $contacts->paginate(14);
        }

        if($hasSearch){
            $contacts->appends(['status' => $isStatus, 'keyword' => $keyword]);
        }
        return [
            'contacts' => $contacts,
            'queries' => ['status' => $isStatus, 'keyword' => $keyword]
        ];
    }
}

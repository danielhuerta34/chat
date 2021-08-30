<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use DB;

class DashboardController extends Controller
{
    
    public function __construct()
    {
        //$this->middleware('auth');
    }

    
    public function index()
    {
        $nombre = Auth::user()->name;
        $pdocrud = new_PDOCrud();
        $pdomodel = $pdocrud->getPDOModelObj();
        $users = $pdomodel->executeQuery("SELECT count(*) as total FROM users WHERE name = '".$nombre."' ");
        $chat = $pdomodel->executeQuery("SELECT count(*) as total FROM chat WHERE user = '".$nombre."' ");
        return view('dashboard',[
            'users' => $users,
            'chat' => $chat
        ]);
    }

    public function users(){
        $pdocrud = new_PDOCrud();
        $pdocrud->fieldCssClass("name", array("nombre"));
        $pdocrud->fieldTypes("photo", "FILE_NEW");
        $pdocrud->addCallback("before_insert","check_user_insert");
        $pdocrud->addCallback("before_update","check_user_update");
        $pdocrud->addCallback("before_delete","check_user_delete");
        $pdocrud->fieldDataAttr("password", array("placeholder"=>"***","value"=>""));
        $pdocrud->setSettings("deleteMultipleBtn", false);
        $pdocrud->setSettings("checkboxCol", false);
        $pdocrud->setSettings("printBtn", false);
        $pdocrud->setSettings("pdfBtn", false);
        $pdocrud->setSettings("csvBtn", false);
        $pdocrud->setSettings("excelBtn", false);
        $pdocrud->buttonHide("submitBtn");
        $pdocrud->setViewColumns(array("name","photo","email","password"));
        $pdocrud->tableColFormatting("photo", "image", array("width"=>"50px"));
        $pdocrud->viewColFormatting("photo", "image", array("width"=>"50px"));
        $pdocrud->setLangData("save_and_back","Guardar");
        $pdocrud->formFields(array("name","photo","email","password"));
        $pdocrud->fieldRenameLable("name", "Nombre");
        $pdocrud->fieldRenameLable("photo", "Foto");
        $pdocrud->fieldRenameLable("email", "Correo");
        $pdocrud->fieldRenameLable("password", "Contraseña");
        $pdocrud->tableHeading("Usuarios");
        $pdocrud->setSearchCols(array("name","email","password"));
        $pdocrud->crudRemoveCol(array("id","email_verified_at","remember_token","created_at","updated_at"));
        $pdocrud->colRename("name","Nombre");
        $pdocrud->colRename("photo","Foto");
        $pdocrud->colRename("email","Correo");
        $pdocrud->colRename("password","Contraseña");
        $pdocrud->fieldGroups("Name",array("name","photo"));
        $pdocrud->fieldGroups("Name2",array("email","password"));
        $render = $pdocrud->dbTable("users")->render();
        return view('users',[
            'render' => $render
        ]);
    }

    public function profile(){
        $id = Auth::user()->id;

        $pdocrud = new_PDOCrud();
        $pdocrud->setPK("id");
        $pdocrud->addCallback("before_update","profile_update");
        $pdocrud->fieldTypes("photo", "FILE_NEW");
        $pdocrud->fieldDataAttr("password", array("placeholder"=>"***","value"=>""));
        $pdocrud->formFields(array("name","photo","email","password"));
        $pdocrud->fieldRenameLable("name", "Nombre");
        $pdocrud->fieldRenameLable("photo", "Foto");
        $pdocrud->fieldRenameLable("email", "Correo");
        $pdocrud->fieldRenameLable("password", "Contraseña");
        $pdocrud->fieldGroups("Name",array("name","photo"));
        $pdocrud->fieldGroups("Name2",array("email","password"));
        $render = $pdocrud->dbTable("users")->render("EDITFORM", array("id"=>$id));
        return view('profile',[
            'render' => $render
        ]);
    }

    public function chat(){
        $user = Auth::user()->name;

        $avatar = Auth::user()->photo;

    	$pdocrud = new_PDOCrud(false, "", "", array("resetForm" => true));
    	$pdocrud->addPlugin("emojionearea");
    	$pdocrud->dbTable("chat");
    	$pdocrud->setLangData("save","Enviar");
    	$pdocrud->fieldRenameLable("message","Mensaje");
        $pdocrud->fieldRenameLable("image","Foto");
        $pdocrud->formFieldValue("user", $user);
        $pdocrud->formFieldValue("avatar", $avatar);
        $pdocrud->fieldHideLable("user");
        $pdocrud->fieldDataAttr("user", array("style"=>"display:none"));
        $pdocrud->fieldHideLable("avatar");
        $pdocrud->fieldDataAttr("avatar", array("style"=>"display:none"));
        $pdocrud->fieldTypes("image","image");
        $pdocrud->setLangData("success","Mensaje enviado con éxito");
        $pdocrud->fieldNotMandatory("image");
        $pdomodel = $pdocrud->getPDOModelObj();
        $data = $pdomodel->executeQuery("SELECT * FROM chat ORDER BY id asc");
        $pdomodel->where('user', $user);
        $updateData = array("avatar"=>$avatar);
        $pdomodel->update('chat', $updateData);

        return view('chat',[
    		'pdocrud' => $pdocrud,
            'data' => $data
    	]);
    }

    public function messagechat(){
       
        $user = Auth::user()->name;
        $message = DB::table("chat")->where('user','=', $user)->get();
        return $message;
    }
}

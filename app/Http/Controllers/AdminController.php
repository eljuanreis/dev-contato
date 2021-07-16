<?php

namespace App\Http\Controllers;

use App\Mail\RespostasProUser;
use App\Models\Admin;
use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    /*Aqui precisa melhorar a passagem pro front*/
    
    /**
     * Mostrando o painel e passando os dados
     */
    public function painel(Request $request)
    {
        $todosContatos = Contato::paginate(5);
        return view('app.painel', ['todosContatos' => $todosContatos, 'request' => $request]);
    }

    /**
     * Autenticando usuário pelo request via POST
     */
    public function autenticar(Request $request){

        //Não to usando a autenticacao padrão do laravel justamente pra rreinar

        //validacao
        //Em breve aqui uma validação

       
        $email = $request->get('email');
        $senha = $request->get('senha');
         //<campo banco> <campo recebido>
        $check = Admin::where('email', $email)->where('password',$senha);
        $check = $check->first();
        if($check){
            session_start();
            $_SESSION['ID'] = $check->id; 
            $_SESSION['EMAIL'] = $check->email; 
            $_SESSION['NOME'] = $check->name; 
            return redirect()->route('admin.painel');
        }else{
            return view('app.login', ['erro' => 'Usuário não existe']);
        }
    }

    public function logout()
    {
        session_destroy();
        return redirect()->route('inicio');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $contato_especifico = Contato::find($id);
        if($contato_especifico){
            return view('app.show', ['contato' => $contato_especifico]);
        }else{
            //caso não ache o registro, volta pro painel
            return redirect()->route('admin.painel');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contato_especifico = Contato::find($id);
         //se nao achar o registro
        if(!$contato_especifico){
            return redirect()->route('admin.painel');
        }
        //se achar o registro vai de ralo
        $contato_especifico->delete();
        return redirect()->route('admin.painel');
    }

    public function responder(Request $request, $id)
    {
        $contato_especifico = Contato::find($id);
        //se nao achar o registro
        if(!$contato_especifico){
            return redirect()->route('admin.painel');
        }

        /* Responder usuário */
        //se tiver requisitando a rota com a 'resposta', logo está mandando a msg
        if($request->post('resposta')){
            $contato_especifico = Contato::find($id);
            $mensagem = $request->post('resposta');
            $email = new RespostasProUser($contato_especifico->nome, $mensagem);
            $email->subject('Resposta de ' . env('APP_NAME'));
            Mail::to($contato_especifico->email)->send($email);
            return view('app.responder-email', ['contato' => $contato_especifico, 'respondido' => 'true']);
        }else{
            /* Mostrando formulário pra responder */
            $contato_especifico = Contato::find($id);
            return view('app.responder-email', ['contato' => $contato_especifico]);
        }
    }

}

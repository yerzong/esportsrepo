<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function listOrganization()
    {
        $list = Organization::all();
        return view('organizations', compact('list'));

    }

    public function createOrganization(Request $request)
    {
    // Validación de datos ingresados en el formulario
        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'image' => 'required',
        'web' => 'required',
        'country' => 'required',
    ]);
    $data = $request->all();


    // Creación de una nueva instancia de Organization con los datos validados
    $data = new Organization([
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'],
        'image' => $data['image'],
        'web' => $data['web'],
        'country' => $data['country'],
    ]);

    // Guardar el nuevo registro en la base de datos
    $this->log('ORGANIZATION', 'CREATE', $data);

    // Redireccionar a la vista de lista de organizaciones con un mensaje de éxito
    return redirect("organization")->withSuccess('Great! You have Successfully organization');


}

public function updateOrganization(Request $request, $id)
{
    // Validación de datos ingresados en el formulario
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'image' => 'required',
        'web' => 'required',
        'country' => 'required',
    ]);

    $data = $request->all();


    // Buscar la organización existente por su ID
    $organization = Organization::find($data['id']);
    $this->log('ORGANIZATION', 'UPDATE', $organization);

    // Actualizar los atributos de la organización con los datos validados
    $organization->fill($data);
    $organization->save();
    // Redireccionar a la vista de lista de organizaciones con un mensaje de éxito
    return redirect("organization")->withSuccess('Successfully updated!');

}

public function deleteOrganization($id)
{
    // Buscar la organización por su ID
    $organization = Organization::findOrFail($id);

    // Eliminar la organización
    $this->log('ORGANIZATION', 'DELETE', $organization);
    $organization->delete();

    // Redireccionar a la vista de lista de organizaciones con un mensaje de éxito
    return redirect("organization")->withSuccess('Successfully deleted!');

}



}
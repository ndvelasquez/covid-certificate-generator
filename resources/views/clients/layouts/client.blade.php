<form class="max-w-xs" id="patient_form" method="POST">
    @csrf
    
    <p class="block font-medium text-sm text-gray-700">Tipo de Documento*:</p>
    <select class="form-input w-full rounded-md shadow-sm" id="document_type" onchange="findUser(null)" name="document_type" required>
        <option value="dni">DNI</option>
        <option value="ce">Carnet de extranjería</option>
        <option value="pasaporte">Pasaporte</option>
        <option value="otros">Otro</option>
    </select>
    <label class="block font-medium text-sm text-gray-700" for="document_number">N° de documento*:</label>
    <input class="form-input w-full rounded-md shadow-sm" onchange="findUser(this)" id="document_number" type="text" name="document_number" required>
    <label class="block font-medium text-sm text-gray-700" for="passport">Pasaporte (opcional):</label>
    <input class="form-input w-full rounded-md shadow-sm" id="passport" type="text" name="passport">
    <label class="block font-medium text-sm text-gray-700" for="first_name">Nombre(s)*:</label>
    <input class="form-input w-full rounded-md shadow-sm uppercase" id="first_name" type="text" name="first_name" required>
    <label class="block font-medium text-sm text-gray-700" for="last_name">Apellido(s)*:</label>
    <input class="form-input w-full rounded-md shadow-sm uppercase" id="last_name" type="text" name="last_name" required>
    <p class="block font-medium text-sm text-gray-700">Sexo*:</p>
    <input type="radio" id="male" name="gender" value="masculino">
    <label for="male">Masculino</label>
    <input type="radio" id="female" name="gender" value="femenino">
    <label for="female">Femenino</label>
    <label class="block font-medium text-sm text-gray-700" for="born_date">Fec. Nacimiento*:</label>
    <input class="form-input w-full rounded-md shadow-sm" type="date" name="born_date" required>
    <label class="block font-medium text-sm text-gray-700" for="phone">N° teléfono (opcional)</label>
    <input class="form-input w-full rounded-md shadow-sm uppercase" type="text" name="phone">
    
    <input type="submit" class="block border-2 cursor-pointer text-white bg-green-500 hover:bg-green-700 rounded-md my-2 py-2 px-4" value="Guardar">
</form>
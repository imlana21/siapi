
	function loginRequired() {
		if (!$("#txtId").val()) {
			alert("Username tidak boleh kosong");
			$("#txtId").focus();
			return false;
		}
		if (!$("#txtPassword").val()) {
			alert("Password tidak boleh kosong");
			$("#txtPassword").focus();
			return false;
		}
	}

	function inputRequired() {
		if (!$("#id").val("")) {
			alert("Tidak Boleh Kosong");
			$("#id").focus();
			return false; 
		}
		if (!$("#nama").val("")) {
			alert("Tidak Boleh Kosong");
			$("#nama").focus();
			return false;
		}
		if (!$("#gender").val("")) {
			alert("Tidak Boleh Kosong");
			$("#gender").focus();
			return false;
		}
		if (!$("#phone").val("")) {
			alert("Tidak Boleh Kosong");
			$("#phone").focus();
			return false;
		}
		if (!$("#kelas").val("")) {
			alert("Tidak Boleh Kosong");
			$("#kelas").focus();
			return false;
		}
		if (!$("#alamat").val("")) {
			alert("Tidak Boleh Kosong");
			$("#alamat").focus();
			return false;
		}
		if (!$("#pengarang").val("")) {
			alert("Tidak Boleh Kosong");
			$("#pengarang").focus();
			return false;
		}
		if (!$("#penerbit").val("")) {
			alert("Tidak Boleh Kosong");
			$("#penerbit").focus();
			return false;
		}
		if (!$("#tahun").val("")) {
			alert("Tidak Boleh Kosong");
			$("#tahun").focus();
			return false;
		}
		if (!$("#bidang").val("")) {
			alert("Tidak Boleh Kosong");
			$("#bidang").focus();
			return false;
		}
	}
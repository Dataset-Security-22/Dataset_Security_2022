(function($,W,D) {
	var JQUERY4U = {};
	JQUERY4U.UTIL =
	{
		setupFormValidation: function()
		{
			$("#login_form").validate({
				ignore: "",
				rules: {
					email: {
						required: true,
						email:true
					},
					password: {
						required: true
					}
				},

				messages: {
					email: {
						required: "Email harap di isi!",
						email: "Harap masukan email yang valid!"
					},
					password: {
						required: "Password harap di isi!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#register_form").validate({
				ignore: "",
				rules: {
					nama_lengkap: {
						required: true
					},
					email: {
						required: true,
						email: true
					},
					telepon: {
						required: true
					},
					password: {
						required: true,
						rangelength:[6,20]
					}
				},

				messages: {
					nama_lengkap: {
						required: "Nama lengkap harap di isi!"
					},
					email: {
						required: "Email harap di isi!",
						email: "Harap masukan email yang valid!"
					},
					telepon: {
						required: "No. telepon harap di isi!"
					},
					password: {
						required: "Password harap di isi!",
						rangelength: "Password minimal 6 panjangnya!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#forgot_password_form").validate({
				ignore: "",
				rules: {
					email: {
						required: true,
						email: true
					}
				},

				messages: {
					email: {
						required: "Email harap di isi!",
						email: "Harap masukan email yang valid!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#profile_form").validate({
				ignore: "",
				rules: {
					nama_lengkap: {
						required: true
					},
					email: {
						required: true
					},
					telepon: {
						required: true
					},
					alamat: {
						required: true,
					},
					image: {
						accept: "image/*"
					}
				},

				messages: {
					nama_lengkap: {
						required: "Nama lengkap harap di isi!"
					},
					email: {
						required: "Email harap di isi!"
					},
					telepon: {
						required: "No. telepon harap di isi!"
					},
					alamat: {
						required: "Alamat harap di isi!"
					},
					image: {
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#kendaraan_form").validate({
				ignore: "",
				rules: {
					nama: {
						required: true
					},
					harga: {
						required: true
					},
					jumlah: {
						required: true
					},
					keterangan: {
						required: true
					},
					gambar: {
						accept: "image/*"
					}
				},

				messages: {
					nama: {
						required: "Nama wajib diisi!"
					},
					harga: {
						required: "Harga wajib diisi!"
					},
					jumlah: {
						required: "Jumlah wajib diisi!"
					},
					keterangan: {
						required: "Keterangan wajib diisi!"
					},
					gambar: {
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#edit_kendaraan_form").validate({
				ignore: "",
				rules: {
					edit_nama: {
						required: true
					},
					edit_harga: {
						required: true
					},
					edit_jumlah: {
						required: true
					},
					edit_keterangan: {
						required: true
					},
					edit_gambar: {
						accept: "image/*"
					}
				},

				messages: {
					edit_nama: {
						required: "Nama wajib diisi!"
					},
					edit_harga: {
						required: "Harga wajib diisi!"
					},
					edit_jumlah: {
						required: "Jumlah wajib diisi!"
					},
					edit_keterangan: {
						required: "Keterangan wajib diisi!"
					},
					edit_gambar: {
						accept: "Tipe file harus gambar (jpg, png, jpeg)"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});

			$("#password_form").validate({
				ignore: "",
				rules: {
					currentPassword: {
						required: true
					},
					newPassword: {
						required: true,
						rangelength:[6,20]
					},
					confirmPassword: {
						required: true,
						rangelength:[6,20],
						equalTo: "#newPassword"
					}
				},

				messages: {
					currentPassword: {
						required: "Password lama wajib diisi!"
					},
					newPassword: {
						required: "Password baru wajib diisi!",
						rangelength: "Password minimal 6 panjangnya!"
					},
					confirmPassword: {
						required: "Konfirmasi password wajib diisi!",
						rangelength: "Password minimal 6 panjangnya!",
						equalTo: "Konfirmasi password wajib sama dengan password baru!"
					}
				},

				submitHandler: function(form) {
					form.submit();
				}
			});
		}
	}

	$(D).ready(function($) {
		JQUERY4U.UTIL.setupFormValidation();
	});

})(jQuery, window, document);
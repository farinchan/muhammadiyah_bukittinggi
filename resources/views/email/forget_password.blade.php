<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#FEF7F4">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<img alt="Logo" style="height: 100px" src="https://res.cloudinary.com/do8klrf5z/image/upload/v1715317527/logo_sipar_kierhm.png" class="h-45px" />
				</td>
			</tr>
			<tr>
				<td align="left" valign="center">
					<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
						<!--begin:Email content-->
						<div style="padding-bottom: 30px; font-size: 17px;">
							<strong>Hello!, {{ $email }}</strong>
						</div>
						<div style="padding-bottom: 30px">
							Apakah anda mengalami masalah pada login?
							Kami mengirim email ini karena kami mendapatkan informasi bahwasannya anda mengalami masalah pada otorisasi, tekan tombol dibawah ini untuk melakukan reset password:
						</div>
						<div style="padding-bottom: 40px; text-align:center;">
							<a href="{{ route('auth.reset-password', $token) }}" rel="noopener" style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#EB662B;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle" target="_blank">Reset Password</a>
						</div>
						<div style="padding-bottom: 10px">Tautan pengaturan ulang kata sandi ini akan kedaluwarsa dalam 60 menit</div>
						<div style="border-bottom: 1px solid #eeeeee; margin: 15px 0"></div>
						<div style="padding-bottom: 10px; word-wrap: break-all;">
							<p style="margin-bottom: 10px;">atau salin URL ini ke browser Anda:</p>
							<a href="{{ route('auth.reset-password', $token) }}" rel="noopener" target="_blank" style="text-decoration:none;color: #EB662B">{{ route('auth.reset-password', $token) }}</a>
						</div>
						<!--end:Email content-->
						<div style="padding-bottom: 10px">Salam hangat
						<br>Manajemen Aiva Losmen
						<tr>
							<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
								<p>Jl. Nasional Jl. Swadaya No.Simpang, Rundeng, Kec. Johan Pahlawan<br>Kabupaten Aceh Barat, Aceh
								<p>Copyright ©
								<a href="https://aivalosmen.com/" rel="noopener" target="_blank">Aiva Losmen</a>.</p>
							</td>
						</tr></br></div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
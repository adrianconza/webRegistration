<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Validator::extend('is_valid_cedula', function($attribute, $cedulaRuc, $parameters, $validator) {
            $n1 = intval(substr($cedulaRuc, 0, 1));
            $n2 = intval(substr($cedulaRuc, 1, 1));
            $n3 = intval(substr($cedulaRuc, 2, 1));
    		$n4 = intval(substr($cedulaRuc, 3, 1));
    		$n5 = intval(substr($cedulaRuc, 4, 1));
    		$n6 = intval(substr($cedulaRuc, 5, 1));
    		$n7 = intval(substr($cedulaRuc, 6, 1));
    		$n8 = intval(substr($cedulaRuc, 7, 1));
    		$n9 = intval(substr($cedulaRuc, 8, 1));
    		$n10 = intval(substr($cedulaRuc, 9, 1));

            if (!(intval(substr($cedulaRuc, 0, 2)) >= 1 && intval(substr($cedulaRuc, 0, 2)) <= 24)
				&& intval(substr($cedulaRuc, 0, 2)) != 99)
                return false;
    		if (!($n3 >= 0 && $n3 <= 6) && ($n3 != 9))
    			return false;

            $checksumPersonaNatural = ($this->calculoNumero($n1) + $n2 + $this->calculoNumero($n3) + $n4 + $this->calculoNumero($n5) + $n6
            				+ $this->calculoNumero($n7) + $n8 + $this->calculoNumero($n9) + $n10) % 10;

    		$checksumSociedadesPrivadas = (($n1 * 4) + ($n2 * 3) + ($n3 * 2) + ($n4 * 7) + ($n5 * 6) + ($n6 * 5) + ($n7 * 4)
    				+ ($n8 * 3) + ($n9 * 2) + $n10) % 11;

    		$checksumSociedadesPublicas = (($n1 * 3) + ($n2 * 2) + ($n3 * 7) + ($n4 * 6) + ($n5 * 5) + ($n6 * 4) + ($n7 * 3)
    				+ ($n8 * 2) + $n9) % 11;

            if ($checksumPersonaNatural == 0 || ($checksumSociedadesPrivadas == 0 && $n3 == 9)
				|| ($checksumSociedadesPublicas == 0 && $n3 == 6))
                return true;
		    return false;
        });
    }

    private function calculoNumero($numero) {
		return $numero > 4 ? $numero * 2 - 9 : $numero * 2;
	}

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagihanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_pelanggan' => $this->id_pelanggan,
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
            'meter_kubik' => $this->meter_kubik,
            'jml_tagih' => $this->jml_tagih,
            'jml_bayar' => $this->jml_bayar,
            'tgl_bayar' => $this->tgl_bayar,
            'alamat' => $this->alamat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

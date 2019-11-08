<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SIM302 extends Model
{
    protected $table = 'sim302';

    protected $fillable = [
        "tpdocument",
        "cdtcmce",
        "dtverorca",
        "cdorgao",
        "cdunidade",
        "cdfuncao",
        "cdsubfunc",
        "cdprograma",
        "cdproj1",
        "cdproj2",
        "cdsubproj",
        "cdcedporca",
        "tpfore_sim",
        "cdfont_sim",
        "dtrefedocu",
        "tpbalatcm",
        "vlprevorca",
        "vlsuplemes",
        "vlsupletot",
        "vlanulmes",
        "vlanultot",
        "vlsubtrmes",
        "vlsubtrtot",
        "vlacresmes",
        "vlacrestot",
        "saldodota",
        "vlempemes",
        "vlempetot",
        "vlaempmes",
        "vlaemptot",
        "empeapag",
        "vlliqmes",
        "vlliqtot",
        "vlaliqmes",
        "vlaliqtot",
        "vlpagmes",
        "vlpagtot",
        "vlapagmes",
        "vlapagtot",
        "vlsubftmes",
        "vlsubfttot",
        "vlacrftmes",
        "vlacrfttot",
        "nuregi",
        "dtenvio",
        "regimpor"
    ];
}
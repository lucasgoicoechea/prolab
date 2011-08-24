//SELECTS
var pais = new LiveValidation('pais', {onlyOnSubmit: true } );
pais.add( Validate.Exclusion, { within: [ '0' ] } );

var estado = new LiveValidation('estado', {onlyOnSubmit: true } );
estado.add( Validate.Exclusion, { within: [ '0' ] } );

var ciudad = new LiveValidation('ciudad', {onlyOnSubmit: true } );
ciudad.add( Validate.Exclusion, { within: [ '0' ] } );
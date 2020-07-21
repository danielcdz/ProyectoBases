create database P2;

use "P2"

--####################################TABLA EMPRESA
create table Empresa
(
	CedulaJuridica numeric not null Primary key,
	Nombre varchar(50),
	ReferenciaGPS varchar(50),
	CorreoElectronico varchar(100),
	TipoEmpresa varchar(200)
)
--####################################TABLA HABITACION
create table Habitacion
(
	ID_Habitacion int not null Primary key identity(1,1),
	CedulaJuridica numeric Foreign key references Empresa(CedulaJuridica),
	Nombre varchar(50),
	NumHabitacion smallint,
	Precio decimal(9,2),
	Tipo varchar(50),
	Descripcion varchar(100),
	Estado bit
)

--#####################PROCEDURE PARA AGREGAR HABITACION
create PROCEDURE AgregarHabitacion
	@Nombre varchar(50),
	@NumHabitacion smallint,
	@Precio decimal(9,2),
	@Tipo varchar(50),
	@Descripcion varchar(100),
	@Estado bit
AS
BEGIN
	insert Habitacion (Nombre,NumHabitacion,Precio,Tipo,Descripcion,Estado)
	VALUES (@Nombre,@NumHabitacion,@Precio,@Tipo,@Descripcion,@Estado)
END

execute AgregarHabitacion 'KING',13,1456587.2,'sick','habitacion con cama inteligente,TV 4K',false

--##########################PROCEDURE PARA CONSULTAR HABITACION*****
create PROCEDURE ConsultaDatos_Habitacion
	@ID_Habitacion int
AS
BEGIN
	SELECT Nombre,NumHabitacion,Precio,Tipo,Descripcion,Estado
	FROM Habitacion
	WHERE @ID_Habitacion = ID_Habitacion
END

--#########################TABLA LISTA COMODIDADES
create table ListaComodidades
(
	ID_ListaComodidades  int not null Primary key identity(1,1),
	ID_Habitacion int not null Foreign key references Habitacion(ID_Habitacion),
	Wifi bit,
	AireAcondicionado bit,
	AguaCaliente bit,
	TV bit
)

--######################PROCEDURE PARA AGREGAR LISTAS DE COMODIDADES
create PROCEDURE AgregarComodidades
	@ID_Habitacion int,
	@Wifi bit,
	@AireAcondicionado bit,
	@AguaCaliente bit,
	@TV bit
AS
BEGIN
	insert ListaComodidades (ID_Habitacion,Wifi,AireAcondicionado,AguaCaliente,TV)
	VALUES (@ID_Habitacion,@Wifi,@AireAcondicionado,@AguaCaliente,@TV)
END

execute AgregarComodidades 1,1,0,1,1

--#####################CONSULTA COMODIDADES DE EMPRESA
create PROCEDURE Consulta_Comodidades
	@ID_Habitacion int,
	@resultado varchar(100) output
AS
BEGIN
	IF (SELECT Wifi from ListaComodidades where ID_Habitacion = @ID_Habitacion) = 1 
		set @resultado = CONCAT(@resultado,'Wifi,')
	IF (SELECT AireAcondicionado from ListaComodidades where ID_Habitacion = @ID_Habitacion) = 1
		set @resultado = CONCAT(@resultado,'A/C,')
	IF (SELECT AguaCaliente from ListaComodidades where ID_Habitacion = @ID_Habitacion) = 1
		set @resultado = CONCAT(@resultado,'Agua Caliente,')
	IF (SELECT TV from ListaComodidades where ID_Habitacion = @ID_Habitacion) = 1
		set @resultado = CONCAT(@resultado,'TV HD,')
	SELECT @resultado
END

execute Consulta_Comodidades 1,''
	
--#####################TABLA LISTA DE FOTOGRAFIAS
create table ListaFotografias
(
	ID_ListaFotografias int not null Primary key identity(1,1),
	ID_Habitacion int not null Foreign key references Habitacion(ID_Habitacion),
	URL_Fotografia varchar (200),
)

--################PROCEDURE PARA AGREGAR UNA LISTA DE FOTOGRAFIAS
create PROCEDURE Agregar_ListaFotografias
	@ID_Habitacion int,
	@URL_Fotografia varchar(200)
AS
BEGIN
	insert ListaFotografias (ID_Habitacion,URL_Fotografia)
	VALUES (@ID_Habitacion,@URL_Fotografia)
END

execute Agregar_ListaFotografias 1,'http//:ksjljhsbhsbfusfwaevADGW263487.com'

--################PROCEDURE PARA CONSULTAR LA LISTA DE FOTOGRAFIAS
create PROCEDURE Consulta_ListaFotografias
	@ID_Habitacion int
AS
BEGIN
	SELECT STUFF(
		(SELECT  ', ' + URL_Fotografia FROM ListaFotografias
			WHERE ID_Habitacion = @ID_Habitacion
			FOR XML PATH ('')),
		1,2,'') AS FotosHabitacion
END

execute Consulta_ListaFotografias 1
	
--#####################PROCEDURE PARA AGREGAR DATOS DE UNA EMPRESA
create PROCEDURE AgregarEmpresa
	@CedulaJuridica numeric,
	@Nombre varchar(50),
	@ReferenciaGPS varchar(50),
	@CorreoElectronico varchar(100),
	@TipoEmpresa varchar(200)
AS
BEGIN
	insert Empresa (CedulaJuridica,Nombre,ReferenciaGPS,CorreoElectronico,TipoEmpresa)
	VALUES (@CedulaJuridica,@Nombre,@ReferenciaGPS,@CorreoElectronico,@TipoEmpresa)
END
execute AgregarEmpresa 265,'Alexus','por ahi','asmalexander@hotmail.com','hostal,hotel'

--##################PROCEDURE CONSULTAR DATOS DE LA EMPRESA
create PROCEDURE ConsultaDatos_Empresa
	@CedulaEmpresa int
AS
BEGIN
	SELECT distinct Nombre,CorreoElectronico
	FROM Empresa
	WHERE @CedulaEmpresa = CedulaJuridica
END

execute ConsultaDatos_Empresa 245

--################################TABLA SERVICIOS EMPRESA
create table ServiciosEmpresa
(
	CedulaJuridica numeric Foreign key references Empresa(CedulaJuridica),
	Bar bit,
	Rancho bit,
	Piscina bit,
	Restaurante bit,
	Casino bit,
)

--###############PROCEDURE PARA AGREGAR SERVICIOS DE LA EMPRESA
create PROCEDURE Agregar_ServiciosEmpresa
	@CedulaJuridica numeric,
	@Bar bit,
	@Rancho bit,
	@Piscina bit,
	@Restaurante bit,
	@Casino bit
AS
BEGIN
	insert ServiciosEmpresa (CedulaJuridica,Bar,Rancho,Piscina,Restaurante,Casino)
	VALUES (@CedulaJuridica,@Bar,@Rancho,@Piscina,@Restaurante,@Casino)
END

execute Agregar_ServiciosEmpresa 265,True,True,False,True,False

--#######################PROCEDURE PARA CONSULTAR LOS SERVICIOS DE LA EMPRESA
create PROCEDURE Consulta_ServiciosEmpresa
	@CedulaJuridica numeric,
	@resultado varchar(100) output
AS
BEGIN
	IF (SELECT Bar from ServiciosEmpresa where CedulaJuridica = @CedulaJuridica) = 1 
		set @resultado = CONCAT(@resultado,'Bar,')
	IF (SELECT Rancho from ServiciosEmpresa where CedulaJuridica = @CedulaJuridica) = 1
		set @resultado = CONCAT(@resultado,'Rancho,')
	IF (SELECT Piscina from ServiciosEmpresa where CedulaJuridica = @CedulaJuridica) = 1
		set @resultado = CONCAT(@resultado,'Piscina,')
	IF (SELECT Restaurante from ServiciosEmpresa where CedulaJuridica = @CedulaJuridica) = 1
		set @resultado = CONCAT(@resultado,'Restaurante,')
	IF (SELECT Casino from ServiciosEmpresa where CedulaJuridica = @CedulaJuridica) = 1
		set @resultado = CONCAT(@resultado,'Casino')
	SELECT @resultado as resultado
END

execute Consulta_ServiciosEmpresa 7777,''

select * from Empresa


--###############################TABLA TABLA DE HABITACIONES
create table TablaHabitaciones
(
	ID_Habitaciones int not null Primary key identity(1,1),
	ID_Habitacion int not null Foreign key references Habitacion(ID_Habitacion),
	CedulaJuridica numeric not null Foreign key references Empresa(CedulaJuridica),
	Estado bit,
)

--###################PROCEDURE PARA AGREGAR UNA TABLA DE HABITACIONES
create PROCEDURE AgregarTablaHabitaciones
	@ID_Habitacion int,
	@CedulaJuridica numeric,
	@Estado bit
AS
BEGIN
	insert TablaHabitaciones (ID_Habitacion,CedulaJuridica,Estado)
	VALUES (@ID_Habitacion,@CedulaJuridica,@Estado)
END

--###############################TABLA LISTA DE SITIOS WEB
create table Lista_SitiosWeb
(
	ID_Lista_SitiosWeb int not null Primary key identity(1,1),
	URL_SitioWeb varchar(200),
	CedulaJuridica int not null Foreign key references Empresa(CedulaJuridica)
)

--#####################PROCEDURE PARA AGREGAR UNA LISTA DE SITIOS WEB
create PROCEDURE AgregarLista_SitiosWeb
	@URL_SitioWeb varchar(200),
	@CedulaJuridica numeric
AS
BEGIN
	insert Lista_SitiosWeb (URL_SitioWeb,CedulaJuridica)
	VALUES (@URL_SitioWeb,@CedulaJuridica)
END

execute AgregarLista_SitiosWeb 'http//:dkashbfjhbf.sdfysgdfusf.com',245

--####################PRODUCER PARA CONSULTAS LA LISTA DE SITIOS WEB
create PROCEDURE Consulta_ListaSitiosWeb
	@CedulaJuridica numeric
AS
BEGIN
	SELECT STUFF(
		(SELECT  ', ' + URL_SitioWeb FROM Lista_SitiosWeb
			WHERE CedulaJuridica = @CedulaJuridica
			FOR XML PATH ('')),
		1,2,'') AS SitiosWeb
END

execute Consulta_ListaSitiosWeb 245

--############################TABLA LISTA REDES SOCIALES
create table Lista_RedesSociales
(
	ID_Lista_RedesSociales int not null Primary key identity(1,1),
	URL_Red varchar(200),
	CedulaJuridica numeric not null Foreign key references Empresa(CedulaJuridica)
)

--##################PROCEDURE PARA AGREGAR UNA LISTA DE REDES SOCIALES
create PROCEDURE AgregarLista_RedesSociales
	@URL_Red varchar(200),
	@CedulaJuridica numeric
AS
BEGIN
	insert Lista_RedesSociales (URL_Red,CedulaJuridica)
	VALUES (@URL_Red,@CedulaJuridica)
END

execute AgregarLista_RedesSociales 'http//:faceshuk/profile/skdhfbksadfkbf.com',245

--####################PRODUCER PARA CONSULTAS LA LISTA DE REDES SOCIALES
create PROCEDURE Consulta_ListaRedesSociales
	@CedulaJuridica numeric
AS
BEGIN
	SELECT STUFF(
		(SELECT  ', ' + URL_Red FROM Lista_RedesSociales
			WHERE CedulaJuridica = @CedulaJuridica
			FOR XML PATH ('')),
		1,2,'') AS RedesSociales
END

execute Consulta_ListaRedesSociales 245

--################################TABLA DIRECCION DE LA EMPRESA
create table DireccionEmpresa(
	CedulaJuridica numeric Foreign key references Empresa(CedulaJuridica),
	provincia varchar(50),
	canton varchar(50),
	distrito varchar(50),
	barrio varchar(50),
	señasExactas varchar(255)
)

--###############PROCEDURE AGREGAR DIRECCION DE UNA EMPRESA
create PROCEDURE AgregarDireccionEmpresa
	@CedulaJuridica numeric,
	@Provincia varchar(50),
	@Canton varchar(50),
	@Distrito varchar(50),
	@Barrio varchar(50),
	@Señas_Exactas varchar(255)
AS
BEGIN
	INSERT DireccionEmpresa (CedulaJuridica,provincia, canton, distrito, barrio, señasExactas)
	VALUES (@CedulaJuridica, @Provincia, @Canton, @Distrito, @Barrio, @Señas_Exactas)
END
execute AgregarDireccionEmpresa 265,'Puerto Limon','Limon','Limon Centro','SigloXXI','Por la pulperia 88'

--############################PROCEDURE PARA CONSULTAR DATOS DE LA DIRECCION
create PROCEDURE ConsultaDireccionEmpresa
	@CedulaJuridica numeric
AS
BEGIN
	SELECT distinct CONCAT('Provincia:', provincia,', Cantón:', canton,', Distrito:', distrito,', Barrio:', barrio,', Señas Exactas:', señasExactas)
	FROM DireccionEmpresa
	WHERE @CedulaJuridica = CedulaJuridica
END

execute ConsultaDireccionEmpresa 245

--############################TABLA TELEFONOS EMPRESA
create table TelefonosEmpresa
(
	ID_TelefonosEmpresa int not null Primary key identity(1,1),
	NumeroTelefono1 int,
	NumeroTelefono2 int,
	CedulaJuridica numeric not null Foreign key references Empresa(CedulaJuridica)
)

--#######################PROCEDURE AGREGAR TELEFONOS DE LA EMPRESA
create PROCEDURE AgregarTelefonosEmpresa
	@NumTelefono1 int,
	@NumTelefono2 int,
	@CedulaJuridica numeric
AS
BEGIN
	insert TelefonosEmpresa (NumeroTelefono1,NumeroTelefono2,CedulaJuridica) values (@NumTelefono1,@NumTelefono1,@CedulaJuridica)
END

execute AgregarTelefonosEmpresa 67437676,24245345,265

--###############PROCEDURE Consultar TELEFONOS DE LA EMPRESA
create PROCEDURE Consulta_TelefonosEmpresa
	@CedulaEmpresa int
AS
BEGIN
	SELECT distinct CONCAT(NumeroTelefono1,',',NumeroTelefono2)
	FROM TelefonosEmpresa
	WHERE @CedulaEmpresa = CedulaJuridica
END

execute Consulta_TelefonosEmpresa 265

--#######################TABLA CLIENTE
create table Cliente
(
	Cedula int not null Primary key,
	FechaNacimiento date,
	TipoID varchar(50),
	Nombre varchar(50),
	PrimerApellido varchar(50),
	SegundoApellido varchar(50),
	CorreoElectronico varchar(100),
)

--######################PROCEDURE PARA AGREGAR UN CLIENTE
create PROCEDURE AgregarCliente
	@Cedula int,
	@FechaNacimiento date,
	@TipoID varchar(50),
	@Nombre varchar(50),
	@Primer_Apellido varchar(50),
	@Segundo_Apellido varchar(50),
	@CorreoElectronico varchar(100)
AS
BEGIN
	insert Cliente (Cedula,FechaNacimiento,TipoID,Nombre,PrimerApellido,SegundoApellido,CorreoElectronico)
	VALUES (@Cedula,@FechaNacimiento,@TipoID,@Nombre,@Primer_Apellido,@Segundo_Apellido,@CorreoElectronico)
END

execute AgregarCliente 765634,'12/9/2000','cedula','Manguito','Calderon','Diaz','manguitomiamor@teamo.com'

--###################PROCEDURE PARA CONSULTAR DATOS DE UN CLIENTE
create PROCEDURE Consulta_Cliente
	@Cedula int
AS
BEGIN
	SELECT distinct Nombre,PrimerApellido,SegundoApellido,TipoID,CorreoElectronico,FechaNacimiento
	FROM Cliente
	WHERE Cedula = @Cedula
END

execute Consulta_Cliente 765634


--##################################TABLA DIRECCION CLIENTE
create table DireccionCliente(
	Cedula int Foreign key references Cliente(Cedula),
	provincia varchar(50),
	canton varchar(50),
	distrito varchar(50),
)

--###############PROCEDURE AGREGAR DIRECCION DE UNA EMPRESA
create PROCEDURE AgregarDireccionCliente
	@Cedula int,
	@Provincia varchar(50),
	@Canton varchar(50),
	@Distrito varchar(50)
AS
BEGIN
	INSERT DireccionCliente (Cedula,provincia, canton, distrito)
	VALUES (@Cedula, @Provincia, @Canton, @Distrito)
END


--############################PROCEDURE PARA CONSULTAR DATOS DE LA DIRECCION
create PROCEDURE ConsultaDireccionCliente
	@Cedula int
AS
BEGIN
	SELECT distinct CONCAT('Provincia:', provincia,', Cantón:', canton,', Distrito:', distrito)
	FROM DireccionCliente
	WHERE @Cedula = Cedula
END

--########################TABLA CREDENCIALES
create table Credenciales
(
	Cedula int not null Foreign key references Cliente(Cedula),
	NombreUsuario varchar(50),
	Clave varchar(50)
)

--######################PROCEDURE PARA AGREGAR CREDENCIALES
create PROCEDURE AgregarCredenciales
	@Cedula int,
	@NombreUsuario varchar(50),
	@Clave varchar(50)
AS
BEGIN
	insert Credenciales (Cedula,NombreUsuario,Clave)
	VALUES (@Cedula,@NombreUsuario,@Clave)
END

--#######################PROCEDURE PARA CONSULTAR CREDENCIALES*****
create PROCEDURE Consulta_Credenciales
	@NombreUsuario varchar(50),
	@Clave int
AS
BEGIN
	SELECT NombreUsuario,Clave
	FROM Credenciales
	WHERE NombreUsuario = @NombreUsuario and Clave = @Clave
END

--###########################TABLA TELEFONOS DEL CLIENTE
create table TelefonosCliente
(
	ID_TelefonosCliente int not null Primary key identity(1,1),
	NumeroTelefono int,
	Cedula int not null Foreign key references Cliente(Cedula)
)


--#####################PROCEDURE PARA TELEFONOS DE CLIENTE
create PROCEDURE Agregar_TelefonosCliente
	
	@NumeroTelefono int,
	@Cedula int
AS
BEGIN
	insert TelefonosCliente (NumeroTelefono,Cedula)
	VALUES (@NumeroTelefono,@Cedula)
END

-- #################################TABLA RESERVACION
create table Reservacion(
	numeroReserva int not null identity(1,1),
	cantidadPersonas smallint not null,
	fechaHoraEntrada datetime,
	fechaHoraSalida datetime,
	ID_Habitacion int not null Foreign key references Habitacion(ID_Habitacion),
	clienteConVehiculo bit,
	Cedula int not null,
	constraint PK_Reserva primary key(numeroReserva),
	constraint FK_CedulaCliente foreign key (Cedula)
	references Cliente(Cedula)  
)

--#############PROCEDURE PARA AGREGAR RESERVACION
create PROCEDURE AgregarReservacion
	@cantidadPersonas smallint,
	@fechaHoraEntrada datetime,
	@fechaHoraSalida datetime,
	@ID_Habitacion int,
	@clienteConVehiculo bit,
	@Cedula int
AS
BEGIN
	insert Reservacion(cantidadPersonas,fechaHoraEntrada,fechaHoraSalida,ID_Habitacion,clienteConVehiculo,Cedula)
	VALUES (@cantidadPersonas,@fechaHoraEntrada,@fechaHoraSalida,@ID_Habitacion,@clienteConVehiculo,@Cedula)
END

execute AgregarReservacion 2,@fecha1,@fecha2,1,1,765634
select * from Reservacion


--########################TABLA FACTURA
create table Factura(
	numeroFactura int not null identity(1,1),
	numeroNoches smallint not null,
	tipoHabitacion varchar(50),
	numReserva int not null,
	numeroHabitacion smallint not null,
	fecha date,
	MontoTotal int,
	constraint PK_Factura primary key(numeroFactura),
	constraint FK_NumeroReserva foreign key(numReserva)
	references Reservacion(numeroReserva)
)

--#############################PROCEDURE PARA AGREGAR UNA FACTURA
create PROCEDURE AgregarFactura
	@numReserva int,
	@numeroNoches smallint,
	@tipoHabitacion varchar(50),
	@numeroHabitacion smallint,
	@fecha date,
	@MontoTotal int
AS
BEGIN
	insert Factura (numReserva,numeroNoches,tipoHabitacion,numeroHabitacion,fecha,MontoTotal)
	VALUES (@numReserva,@numeroNoches,@tipoHabitacion,@numeroHabitacion,@fecha,@MontoTotal)
END

execute AgregarFactura 1,12,'Cabaña',1,'2013/04/10',56723
--#######################PROCEDURE PARA LA CONSULTA DE LA FACTURA
create PROCEDURE Consulta_Factura
	@numReserva int
AS
BEGIN
	SELECT CI.Nombre,RE.Cedula,HA.Nombre as NombreHabitacion,NumHabitacion,numeroNoches,MontoTotal,tipoHabitacion,fecha
	FROM Factura FA
	INNER JOIN Reservacion RE on FA.numReserva = RE.numeroReserva
	INNER JOIN Habitacion HA on RE.ID_Habitacion = HA.ID_Habitacion
	INNER JOIN Cliente CI on RE.Cedula = CI.Cedula
	WHERE @numReserva = numReserva
END
execute Consulta_Factura 1

select * from Empresa

-- ################################################################################################
create table ActividadRecreativa(
	idActividad int not null identity(1,1),
	nombreEmpresa varchar(100),
	contacto varchar(50),
	correoElectronico varchar(70),
	precio decimal(9,2),
	descripcion varchar(255),
	tipoActividad varchar(50),
	constraint PF_Actividad primary key(idActividad),
)


--#################################PROCEDURE PARA AGREGAR UNA ACTIVIDAD RECREATIVA
create PROCEDURE Agregar_ActividadRecreativa
	@nombreEmpresa varchar(100),
	@contacto varchar(50),
	@correoElectronico varchar(70),
	@precio decimal(9,2),
	@descripcion varchar(255),
	@tipoActividad varchar(50)
AS
BEGIN
	insert ActividadRecreativa (nombreEmpresa,contacto,correoElectronico,precio,descripcion,tipoActividad)
	VALUES (@nombreEmpresa,@contacto,@correoElectronico,@precio,@descripcion,@tipoActividad)
END
exec Agregar_ActividadRecreativa 'mambo','jesus','asmalexander@hotmail.com',35463.0,'muy sick','tourmanguito'

--#######################################################33
create table Direccion_ACTRecreativa(
	ID_Actividad int Foreign key references ActividadRecreativa(idActividad),
	provincia varchar(50),
	canton varchar(50),
	distrito varchar(50),
	señasExactas varchar(255)
)

--###############PROCEDURE AGREGAR DIRECCION DE UNA EMPRESA
create PROCEDURE AgregarDireccion_ACTRecreativa
	@ID_Actividad int,
	@Provincia varchar(50),
	@Canton varchar(50),
	@Distrito varchar(50),
	@Señas_Exactas varchar(255)
AS
BEGIN
	INSERT Direccion_ACTRecreativa (ID_Actividad,provincia, canton, distrito,señasExactas)
	VALUES (@ID_Actividad, @Provincia, @Canton, @Distrito,@Señas_Exactas)
END
exec AgregarDireccion_ACTRecreativa 2,'Limon','Limon','pueblo','por ahi'
--############################PROCEDURE PARA CONSULTAR DATOS DE LA DIRECCION
create PROCEDURE ConsultaDireccion_ACTRecreativa
	@ID_Actividad int
AS
BEGIN
	SELECT distinct CONCAT('Provincia:', provincia,', Cantón:', canton,', Distrito:', distrito,', Señas Exactas:', señasExactas)
	FROM Direccion_ACTRecreativa
	WHERE @ID_Actividad = ID_Actividad
END

create table Telefonos_ACTRecreativa
(
	ID_Telefonos_ACTRecreativa int not null Primary key identity(1,1),
	NumeroTelefono int,
	idActividad int not null Foreign key references ActividadRecreativa(idActividad)
)
--#####################PROCEDURE PARA AGREGAR UNA LISTA DE TELEFONOS DE ACTIVIDAD RECREATIVA
create PROCEDURE AgregarTelefonos_ACTRecreativa
	@NumeroTelefono int,
	@idActividad int
AS
BEGIN
	insert Telefonos_ACTRecreativa (NumeroTelefono,idActividad)
	VALUES (@NumeroTelefono,@idActividad)
END
exec AgregarTelefonos_ACTRecreativa 5436576,2

--##########################PROCEDURE PARA LA CONSULTA DE FILTROS DE LA ACTIVIDAD RECREATIVA
create PROCEDURE Consulta_FiltrosACTRecreativa
	@TipoActividad varchar(50) = NULL,
	@Precio decimal(9,2) = NULL,
	@Provincia varchar(50) = NULL,
	@Canton varchar(50) = NULL,
	@NombreEmpresa varchar(100) = NULL
AS
BEGIN
	SELECT A.idActividad,A.nombreEmpresa,A.contacto,A.precio,A.descripcion,A.tipoActividad,T.NumeroTelefono,
	concat(DA.provincia,',',DA.canton,',',DA.señasExactas) as direccion
	FROM ActividadRecreativa A
	INNER JOIN Direccion_ACTRecreativa DA on DA.ID_Actividad = A.idActividad
	INNER JOIN Telefonos_ACTRecreativa T on A.idActividad = T.idActividad
	WHERE (@TipoActividad IS NULL OR tipoActividad like  '%'+@TipoActividad+'%')
	AND (@Precio IS NULL OR @Precio = precio)
	AND (@Provincia IS NULL OR @Provincia = provincia)
	AND (@Canton IS NULL OR @Canton = canton)
	AND (@NombreEmpresa IS NULL OR @NombreEmpresa = nombreEmpresa)
END
exec Consulta_FiltrosACTRecreativa null,null,null,null,'wow'
select * from ActividadRecreativa

create table ReservacionActividad
(
	ID_ReservacionActividad int not null Primary key identity(1,1),
	idActividad int not null Foreign key references ActividadRecreativa(idActividad),
	fecha date,
	TarjetaCredito varchar(50),
)
--#####################PROCEDURE PARA AGREGAR UNA RESERVACION DE ACTIVIDAD RECREATIVA
create PROCEDURE Agregar_ReservarcionActividad
	@idActividad int,
	@fecha date,
	@TarjetaCredito varchar(50)
AS
BEGIN
	insert ReservacionActividad (idActividad,fecha,TarjetaCredito)
	VALUES (@idActividad,@fecha,@TarjetaCredito)
END


create table Lista_TipoActividad
(
	ID_Lista_TipoActividad int not null Primary key identity(1,1),
	idActividad int not null Foreign key references ActividadRecreativa(idActividad),
	Descripcion varchar(100),
)
--####################PROCEDURE PARA AGREGAR UNA LISTA DE TIPOS DE ACTIVIDAD
create PROCEDURE AgregarLista_TipoActividad
	@idActividad int,
	@Descripcion varchar(100)
AS
BEGIN
	insert Lista_TipoActividad (idActividad,Descripcion)
	VALUES (@idActividad,@Descripcion)
END


--######################PROCEDURE PARA LA CONSULTA DE DATOS POR FILTROS
create PROCEDURE Consulta_ReporteFacturado
	@Fecha1 date = NULL,
	@Fecha2 date = NULL,
	@Fecha3 date = NULL,
	@TiposHabitacion varchar(50) = NULL,
	@ID_Habitacion int = NULL
AS
BEGIN
	SELECT numeroFactura,numeroNoches,tipoHabitacion,numReserva,numeroHabitacion,fecha,MontoTotal
	FROM Factura FA
	INNER JOIN Reservacion RE on FA.numReserva = RE.numeroReserva
	WHERE (@Fecha1 IS NULL OR @Fecha1 = fecha)
	AND (@Fecha2 IS NULL OR @Fecha2 <= fecha)
	AND (@Fecha3 IS NULL OR @Fecha3 >= fecha)
	AND (@TiposHabitacion IS NULL OR tipoHabitacion like @TiposHabitacion)
	AND (@ID_Habitacion IS NULL OR @ID_Habitacion = ID_Habitacion)
END

execute Consulta_ReporteFacturado null,null,null,'ña',null
select * from Factura


create PROCEDURE Consulta_FiltrosEmpresa
	@Provincia varchar(50) = NULL,
	@Canton varchar(50) = NULL,
	@Bar bit = NULL,
	@Rancho bit = NULL,
	@Piscina bit = NULL,
	@Restaurante bit = NULL,
	@Casino bit = NULL,
	@Tipo varchar(200) = NULL
AS
BEGIN
	SELECT E.CedulaJuridica,Nombre,CorreoElectronico,concat(T.NumeroTelefono1,',',T.NumeroTelefono2) telefonos,
	concat(DE.provincia,',',DE.canton,',',DE.distrito,',',DE.barrio,',',DE.señasExactas) direccion, E.TipoEmpresa
	FROM Empresa E
	INNER JOIN ServiciosEmpresa SE on E.CedulaJuridica = SE.CedulaJuridica
	INNER JOIN TelefonosEmpresa T on E.CedulaJuridica = T.CedulaJuridica
	INNER JOIN DireccionEmpresa DE on E.CedulaJuridica = DE.CedulaJuridica
	WHERE (@Provincia IS NULL OR @Provincia = provincia)
	AND (@Canton IS NULL OR @Canton = canton)
	AND (@Bar IS NULL OR @BAR = 1)
	AND (@Rancho IS NULL OR @Rancho = 1)
	AND (@Piscina IS NULL OR @Piscina = 1)
	AND (@Restaurante IS NULL OR @Restaurante = 1)
	AND (@Casino IS NULL OR @Casino = 1)
	AND (@Tipo IS NULL OR TipoEmpresa like '%'+@Tipo+'%')
END

create PROCEDURE Consulta_FiltrosEmpresa
	@Provincia varchar(50) = NULL,
	@Canton varchar(50) = NULL,
	@Bar bit = NULL,
	@Rancho bit = NULL,
	@Piscina bit = NULL,
	@Restaurante bit = NULL,
	@Casino bit = NULL,
	@Tipo varchar(200) = NULL
AS
BEGIN
	SELECT E.CedulaJuridica,Nombre,CorreoElectronico,concat(T.NumeroTelefono1,',',T.NumeroTelefono2) telefonos,
	concat(DE.provincia,',',DE.canton,',',DE.distrito,',',DE.barrio,',',DE.señasExactas) direccion, E.TipoEmpresa
	FROM Empresa E
	INNER JOIN ServiciosEmpresa SE on E.CedulaJuridica = SE.CedulaJuridica
	INNER JOIN TelefonosEmpresa T on E.CedulaJuridica = T.CedulaJuridica
	INNER JOIN DireccionEmpresa DE on E.CedulaJuridica = DE.CedulaJuridica
	WHERE (@Provincia IS NULL OR @Provincia = provincia)
	AND (@Canton IS NULL OR @Canton = canton)
	AND (@Bar IS NULL OR @Bar = Bar)
	AND (@Rancho IS NULL OR @Rancho = Rancho)
	AND (@Piscina IS NULL OR @Piscina = Piscina)
	AND (@Restaurante IS NULL OR @Restaurante = Restaurante)
	AND (@Casino IS NULL OR @Casino = Casino)
	AND (@Tipo IS NULL OR TipoEmpresa like '%'+@Tipo+'%')
END

select * from ServiciosEmpresa
exec Consulta_FiltrosEmpresa 'Limon',null,1,null,null,1,null,null




select * from DireccionEmpresa
exec Consulta_FiltrosEmpresa 'Puerto Limon',null,1,null,null,1,null,null

select * from Empresa
--#############################PROCEDURE PARA CONSULTA DE REPORTE 2
create PROCEDURE Consulta_RangoFechas
	@TiposHabitacion varchar(50)
AS
BEGIN
	SELECT fechaHoraEntrada,fechaHoraSalida,Tipo
	FROM Reservacion RE
	INNER JOIN Habitacion HA on RE.ID_Habitacion = HA.ID_Habitacion
	WHERE Tipo like @TiposHabitacion
END

execute Consulta_RangoFechas 'sick'

--############################PROCEDURE PARA CONSULTA DE REPORTE 3
create PROCEDURE Consulta_RangoEdades
	@CedulaJuridica
AS
BEGIN
	SELECT extract(YEAR from 

select * from Habitacion




-- Insercion de datos de ServiciosEmpresa
-- cambiar los valores por los deseados a la hora de insertar
insert into ServiciosEmpresa values(valor1,valor2,valor3,valor4,valor5,valor6)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from ServiciosEmpresa where ID_Servicio=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update ServiciosEmpresa set  Bar=valor1, Rancho=valor2, Piscina=valor3, Restaurante=valor4, Casino=valor5 where ID_Servicio=valor5



-- Insercion de datos de Tipo
-- cambiar los valores por los deseados a la hora de insertar
insert into Tipo values(valor1,valor2,valor3,valor4,valor5,valor6,valor7)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from Tipo where ID_Tipo=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update Tipo set  Hotel=valor1, Hostal=valor2, Casa=valor3, Departamento=valor4,Cabaña=valor5, CuartoCompartido=valor6 where ID_Tipo=valor7


-- Insercion de datos de Habitacion
-- cambiar los valores por los deseados a la hora de insertar
insert into Habitacion values(valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from Habitacion where ID_Habitacion=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update Habitacion set  Nombre=valor1, Precio=valor2, Fotos=valor3, Tipo=valor4, Descripcion=valor5,
Wifi=valor6, AguaCaliente=valor7, AireAcondicionado=valor8 ID_Habitacion=valor9

-- Insercion de datos de TablaHabitaciones
-- cambiar los valores por los deseados a la hora de insertar
insert into TablaHabitaciones values(valor1,valor2)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from TablaHabitaciones where ID_Habitaciones=valor1


-- Insercion de datos de Empresa
-- cambiar los valores por los deseados a la hora de insertar
insert into Empresa values(valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9,valor10,valor11,valor12,valor13,valor14)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from Empresa where CedulaJuridica=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update Empresa set  Nombre=valor1, Telefono1=valor2, Telefono2=valor3, ReferenciaGPS=valor4, Direccion=valor5, Servicios=valor6,
CorreoElectronico=valor7, RedSocial1=valor8, RedSocial2=valor9, SitioWeb1=valor10, SitioWeb2=valor11, Tipo=valor12, Habitaciones=valor13
where CedulaJuridica=valor14

-- Insercion de datos de Cliente
-- cambiar los valores por los deseados a la hora de insertar
insert into Cliente values(valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from Cliente where Cedula=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update Cliente set  FechaNacimiento=valor1, Direccion=valor2, TipoID=valor3, Nombre=valor4, PrimerApellido=valor4, SegundoApellido=valor5,
 Telefono=valor6, CorreoElectronico=valor7 where Cedula=valor8


-- Insercion de datos de Factura
-- cambiar los valores por los deseados a la hora de insertar
insert into Factura values(valor1,valor2,valor3,valor4,valor5)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from Factura where numeroFactura=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update Factura set  numeroNoches=valor1, tipoHabitacion=valor2, numeroReserva=valor3, numeroHabitacion=valor4 where numeroFactura=valor5

-- Busquedas por filtros
-- cambiar los valores por los deseados a la hora de buscar
select * from Factura where numeroReserva=valor1 -- busqueda por numero de reserva

select * from Factura where fecha=valor1 --busqueda por dia,mes,año

select * from Factura where tipoHabitacion=valor1 --busqueda por tipo de habitacion

select * from Factura where numeroHabitacion=valor1 --busqueda por numero de habitacion


-- Insercion de datos de Direccion
-- cambiar los valores por los deseados a la hora de insertar
insert into Direccion values(valor1,valor2,valor3,valor4,valor5,valor6)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from Direccion where idDireccion=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update Direccion set  provincia=valor1, canton=valor2, distrito=valor3, barrio=valor4, señasExactas=valor5 where idDireccion=valor6


-- Insercion de datos
-- cambiar los valores por los deseados a la hora de insertar
insert into Reservacion values(valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from Factura where numeroReserva=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update Reservacion set  cantidadPersonas=valor1, fechaSalida=valor2, horaSalida=valor3, fechaIngreso=valor4,horaIngreso=valor5, numeroHabitacion=valor6,
clienteConVehiculo=valor7, Cedula=valor8 where numeroReserva=valor9

-- Busquedas por filtros
-- cambiar los valores por los deseados a la hora de buscar
select * from Reservacion where numeroReserva=valor1 -- busqueda por numero de reserva



-- Insercion de datos
-- cambiar los valores por los deseados a la hora de insertar
insert into ActividadRecreativa values(valor1,valor2,valor3,valor4,valor5,valor6,valor7,valor8,valor9)

-- Eliminar datos
-- para eliminar cambiar valor1 por el numero de factura que desea eliminar
delete from ActividadRecreativa where idActividad=valor1

-- Actualizar datos
-- cambiar los valores por los deseador a la hora de actualizar
update ActividadRecreativa set  nombreEmpresa=valor1, contacto=valor2, correoElectronico=valor3, telefono=valor4,precio=valor5, descripcion=valor6,
tipoActividad=valor7, idDireccion=valor8 where idActividad=valor9
import Head from 'next/head'


export default function Home() {
    return (
        <div className="text-center mt-5">
            <main className="form-signin">
                <form autoComplete="off">
                    <img id="logo" className="mb-4" src="../../assets/img/logo.png" alt=""/>
                    <h1 className="h3 mb-3 fw-normal text-white ">Ingrese sus credenciales</h1>
                    <div className="form-floating my-2">
                        <input type="text" className="form-control rounded shadow" id="floatingInput"
                               placeholder="Cedula"/>
                        <label htmlFor="floatingInput">Numero de documento</label>
                    </div>
                    <div className="form-floating">
                        <input type="password" className="form-control rounded shadow" id="floatingPassword"
                               placeholder="Contraseña"/>
                        <label htmlFor="floatingPassword">Contraseña</label>
                    </div>
                    <button className="w-100 btn btn-lg btn-primary rounded-pill shadow" type="submit">Entrar</button>
                    <p className="mt-5 mb-3 text-white">&copy; 2022</p>
                </form>
            </main>

            <style jsx>{`

              #logo {
                width: 99%;
              }


              .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
              }

              @media (min-width: 768px) {

                .bd-placeholder-img-lg {
                  font-size: 3.5rem;
                }
              }

              .form-signin {
                width: 100%;
                max-width: 330px;
                padding: 15px;
                margin: auto;
              }

              .form-signin .checkbox {
                font-weight: 400;
              }

              .form-signin .form-floating:focus-within {
                z-index: 2;
              }

              .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
              }

              .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
              }
            `}</style>


        </div>
    )
}

import Image from 'next/image'
import logo from '../assets/img/logo.png';
import React from "react";
import httpClient from "../plugins/httpClient";
import Alert from "../Components/Alert";
import Router from 'next/router'

class Login extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            document: '',
            password: '',
            errorDocument: false
        };
        this.loginForm = this.loginForm.bind(this);
        this.login = this.login.bind(this);
    }

    componentDidMount() {
        document.getElementsByTagName("body")[0].setAttribute("style", "background-color: #00c0f1!important;");
    }

    loginForm(event) {

        if (event.target.name === 'document') {
            this.setState({document: event.target.value});
        }
        if (event.target.name === 'password') {
            this.setState({password: event.target.value});
        }
    }

    login(event) {
        event.preventDefault();

        if (this.state.document === '') {
            return this.setState({errorDocument: 'no puede estar vacio'});
        }

        let users = {
            document: this.state.document,
            password: this.state.password,
            device_name: 'cel',
        }

        httpClient.post('/login', users).then(() => {
            Router.push('/dashboard')
        }).catch(() => {
            return this.setState({errorDocument: 'no puede estar vacio'});
        })
    }

    render() {
        const errorDocument = this.state.errorDocument
        return [
            <div className="text-center mt-5">
                <main className="form-signin">
                    <form autoComplete="off" onSubmit={this.login}>
                        <Image
                            src={logo}
                            alt="Picture of the author"
                            className="mb-4"
                        />

                        <h1 className="h3 mb-3 fw-normal text-white ">Ingrese sus credenciales</h1>
                        <div className="form-floating my-2">
                            <input type="text" className="form-control rounded shadow" id="floatingInput"
                                   placeholder="Cedula" value={this.state.document} onChange={this.loginForm}
                                   name="document"
                            />
                            <label htmlFor="floatingInput">Numero de documento</label>
                            {errorDocument ? <Alert testo={errorDocument}/> : null}


                        </div>
                        <div className="form-floating">
                            <input type="password" className="form-control rounded shadow" id="floatingPassword"
                                   placeholder="Contraseña" value={this.state.password} onChange={this.loginForm}
                                   name="password"
                            />
                            <label htmlFor="floatingPassword">Contraseña</label>
                        </div>
                        <button className="w-100 btn btn-lg btn-primary rounded-pill shadow" type="submit">Entrar
                        </button>
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
        ];
    }
}


export default Login;
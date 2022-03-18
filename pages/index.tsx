import type {NextPage} from 'next'
import axios from "axios";
import {useForm} from 'react-hook-form';
import { useRouter } from 'next/router'



const Home: NextPage = () => {

    const {register, handleSubmit, watch, formState: {errors}} = useForm();
    const router = useRouter()

    const onSubmit = (data: any) => {
        axios.post('https://brujulacoop.test/api/login', {
            username: data.document,
            password: data.password
        }).then(() => router.push('dashboard'))
            .catch(err => {
                console.log(err);
            });
    };

    console.log(errors);
    // console.log(watch("document")); // watch input value by passing the name of it


    return (
        <div className="text-center mt-5">
            <main className="form-signin">
                <form autoComplete="off" onSubmit={handleSubmit(onSubmit)}>
                    <h1 className="h3 mb-3 fw-normal text-white ">Ingrese sus credenciales</h1>
                    <div className="form-floating my-2">
                        <input type="number" className="form-control rounded shadow" id="floatingInput"
                               placeholder="Cedula"
                               {...register("document", {required: true, type: "number"})}
                        />
                        <label htmlFor="floatingInput">Numero de documento</label>
                    </div>
                    <div className="form-floating">
                        <input type="password" className="form-control rounded shadow" id="floatingPassword"
                               placeholder="Contraseña"
                               {...register("password", {required: true})}
                        />
                        <label htmlFor="floatingPassword">Contraseña</label>
                    </div>
                    <button className="w-100 btn btn-lg btn-primary rounded-pill shadow" type="submit">Entrar
                    </button>
                    <p className="mt-5 mb-3 text-white">&copy; 2022</p>
                </form>
            </main>
        </div>
    )
}

export default Home

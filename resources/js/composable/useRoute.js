import route from 'ziggy-js';
import { Ziggy } from "../ziggy"

export default () => {
    return (name, params=undefined, absolute=undefined) => route(name, params, absolute, Ziggy)
}

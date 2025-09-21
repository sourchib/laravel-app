import http from 'k6/http';
import { sleep, check } from 'k6';

export let options = {
    vus: 1,
    duration: '5s',
};

export default function () {
    let res = http.get('https://example.com'); // ganti sesuai endpoint Laravel kamu
    check(res, { 'status was 200': (r) => r.status === 200 });
    sleep(1);
}

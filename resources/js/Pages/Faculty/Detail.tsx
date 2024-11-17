import PanelLayout from "@/components/Layout/Layout";
import {Card, CardContent, CardHeader, CardTitle} from "@/components/ui/card";
import {BookOpen, GraduationCap, Info} from "lucide-react";

const Detail = ({faculty}: any) => {
    console.log(faculty);
    return <>
        <PanelLayout>
            <div className="container mx-auto py-8 px-4">
                <header className="text-center mb-12">
                    <h1 className="text-4xl font-bold mb-4">{faculty?.name}</h1>
                    <Card className="mt-8">
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <Info className="h-6 w-6"/>
                                Thông tin thêm
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <p className="text-muted-foreground">
                                {faculty?.description}
                            </p>
                        </CardContent>
                    </Card>
                </header>

                <div className="grid gap-8 md:grid-cols-2">
                    <Card>
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <GraduationCap className="h-6 w-6"/>
                                Chuẩn đầu ra
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <ul className="list-disc list-inside space-y-2">
                                {faculty?.graduate_standards.map((graduate_standard: any, index: number) => {
                                    return <li key={index}>
                                        {graduate_standard?.full_url ? (
                                            <a target="_blank" rel="noopener" className={'underline'}
                                               href={graduate_standard?.full_url}>
                                                {graduate_standard?.name}
                                            </a>) : <span>{graduate_standard?.name}</span>
                                        }
                                    </li>
                                })}
                            </ul>
                        </CardContent>
                    </Card>

                    <Card>
                        <CardHeader>
                            <CardTitle className="flex items-center gap-2">
                                <BookOpen className="h-6 w-6"/>
                                Chương trình đào tạo
                            </CardTitle>
                        </CardHeader>
                        <CardContent>
                            <ul className="list-disc list-inside space-y-2">
                                {faculty?.programs.map((program: any, index: number) => {
                                    return <li key={index}>
                                        {program?.full_url ? (
                                            <a target="_blank" rel="noopener" className={'underline'}
                                               href={program?.full_url}>
                                                {program?.name}
                                            </a>) : <span>{program?.name}</span>
                                        }
                                    </li>
                                })}
                            </ul>
                        </CardContent>
                    </Card>
                </div>
            </div>
        </PanelLayout>

    </>
}
export default Detail;
